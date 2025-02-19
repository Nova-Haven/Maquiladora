<?php
class Inventario
{
    private const DATA_START_ROW = 8;
    private const TOTALS_OFFSET = 1;  // Totals are always 1 row after data ends
    private const ERROR_IDENTIFIER = '(1)'; // First error mapping always starts with (1)
    private const PERIOD_CELL = 'A4';
    private const CACHE_FILE = __DIR__ . '/../data/inventory_cache.php';
    private const ENCRYPTION_METHOD = 'aes-256-cbc';

    protected static $fileHash;

    private static function getEncryptionKey()
    {
        if (!isset($_ENV['CACHE_ENCRYPTION_KEY'])) {
            throw new Exception('Encryption key not found in environment');
        }
        return $_ENV['CACHE_ENCRYPTION_KEY'];
    }

    private static function getFileHash()
    {
        $filePath = Conexion::getInstance()->getFilename();
        if (!file_exists($filePath)) {
            throw new Exception("Excel file not found");
        }
        return md5_file($filePath);
    }

    private static function loadCache()
    {
        if (file_exists(self::CACHE_FILE)) {
            $encryptedData = file_get_contents(self::CACHE_FILE);
            if ($encryptedData === false) {
                return null;
            }

            try {
                // Get the IV from the first 16 bytes
                $iv = substr($encryptedData, 0, 16);
                $encrypted = substr($encryptedData, 16);
                $encryptionKey = self::getEncryptionKey();

                // Decrypt the data
                $decrypted = openssl_decrypt(
                    $encrypted,
                    self::ENCRYPTION_METHOD,
                    $encryptionKey,
                    0,
                    $iv
                );

                if ($decrypted === false) {
                    return null;
                }

                return unserialize($decrypted);
            } catch (Exception $e) {
                error_log("Cache decryption failed: " . $e->getMessage());
                return null;
            }
        }
        return null;
    }

    private static function saveCache($data, $hash)
    {
        $cacheDir = dirname(self::CACHE_FILE);
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }

        $cache = [
            'hash' => $hash,
            'data' => $data,
            'timestamp' => time()
        ];

        try {
            // Generate a random IV
            $iv = openssl_random_pseudo_bytes(16);
            $encryptionKey = self::getEncryptionKey();

            // Encrypt the serialized data
            $encrypted = openssl_encrypt(
                serialize($cache),
                self::ENCRYPTION_METHOD,
                $encryptionKey,
                0,
                $iv
            );

            if ($encrypted === false) {
                throw new Exception("Encryption failed");
            }

            // Prepend the IV to the encrypted data
            $finalData = $iv . $encrypted;

            // Save the encrypted data
            if (file_put_contents(self::CACHE_FILE, $finalData) === false) {
                throw new Exception("Failed to write cache file");
            }
        } catch (Exception $e) {
            error_log("Cache encryption failed: " . $e->getMessage());
        }
    }

    public static function getAll()
    {
        try {
            $currentHash = self::getFileHash();
            $cache = self::loadCache();

            // Return cached data only if hash matches
            if ($cache && isset($cache['hash']) && $cache['hash'] === $currentHash) {
                return $cache['data'];
            }
            $db = Conexion::getInstance()->getActiveSheet();

            // Find the dynamic row positions
            $positions = self::findRowPositions($db);

            $result = [
                'period' => self::extractPeriod($db),
                'data' => [],
                'totals' => [],
                'errors_mapping' => [],
                'notes' => []
            ];

            // Get main data up to the last data row
            $result['data'] = self::extractMainData($db, $positions['lastDataRow']);

            // Get totals from the row after data
            $result['totals'] = self::extractTotals($db, $positions['totalsRow']);

            // Get error mappings
            $result['errors_mapping'] = self::extractErrorMappings($db, $positions['errorsStartRow'], $positions['errorsEndRow']);

            // Get additional notes
            $result['notes'] = self::extractNotes($db, $positions['notesStartRow'], $positions['notesEndRow']);

            self::saveCache($result, $currentHash);
            return $result;

        } catch (Exception $e) {
            error_log("Error in getAll: " . $e->getMessage());
            return [];
        }
    }

    private static function findRowPositions($db)
    {
        $row = self::DATA_START_ROW;
        $lastDataRow = null;
        $errorsStartRow = null;

        // Find last data row by looking for the last row with product data
        while ($db->getCell('B' . $row)->getValue() !== null) {
            $row++;
        }
        $lastDataRow = $row - 1;

        // Totals row is always right after the last data row
        $totalsRow = $lastDataRow + self::TOTALS_OFFSET;

        // Find errors start row by looking for the (1) pattern
        while ($row < 2000) { // Safe upper limit
            $value = $db->getCell('B' . $row)->getValue();
            if ($value !== null && strpos((string) $value, self::ERROR_IDENTIFIER) === 0) {
                $errorsStartRow = $row;
                break;
            }
            $row++;
        }

        // Find errors end row by counting consecutive error entries
        $errorsEndRow = $errorsStartRow;
        $errorNumber = 1;
        while (true) {
            $nextRow = $errorsEndRow + 1;
            $value = $db->getCell('B' . $nextRow)->getValue();
            if ($value !== null && strpos((string) $value, '(' . ($errorNumber + 1) . ')') === 0) {
                $errorsEndRow = $nextRow;
                $errorNumber++;
            } else {
                break;
            }
        }

        // Notes start right after errors and typically span 8 rows
        $notesStartRow = $errorsEndRow + 1;
        $notesEndRow = $notesStartRow + 7;  // 8 rows of notes

        return [
            'lastDataRow' => $lastDataRow,
            'totalsRow' => $totalsRow,
            'errorsStartRow' => $errorsStartRow,
            'errorsEndRow' => $errorsEndRow,
            'notesStartRow' => $notesStartRow,
            'notesEndRow' => $notesEndRow
        ];
    }

    private static function extractPeriod($db)
    {
        $periodText = $db->getCell(self::PERIOD_CELL)->getValue();
        // Extract dates from format "Del: 01/ENE/2024 Al: 28/FEB/2025"
        preg_match('/Del: (.*?) Al: (.*?)$/', $periodText, $matches);
        return [
            'start' => $matches[1] ?? '',
            'end' => $matches[2] ?? ''
        ];
    }

    private static function extractMainData($db, $lastRow)
    {
        $data = [];
        $columns = [
            'producto' => 'B',
            'nombre' => 'C',
            'metodo_costeo' => 'D',
            'unidades' => [
                'inventario_inicial' => 'F',
                'entradas' => 'G',
                'salidas' => 'H',
                'existencia' => 'I'
            ],
            'importes' => [
                'inventario_inicial' => 'J',
                'entradas' => 'K',
                'salidas' => 'L',
                'inventario_final' => 'M'
            ],
            'error' => 'N'
        ];

        for ($row = self::DATA_START_ROW; $row <= $lastRow; $row++) {
            if ($db->getCell('B' . $row)->getValue() === null) {
                continue;
            }

            $rowData = [
                'producto' => $db->getCell($columns['producto'] . $row)->getValue(),
                'nombre' => $db->getCell($columns['nombre'] . $row)->getValue(),
                'metodo_costeo' => $db->getCell($columns['metodo_costeo'] . $row)->getValue(),
                'unidades' => [
                    'inventario_inicial' => $db->getCell($columns['unidades']['inventario_inicial'] . $row)->getValue(),
                    'entradas' => $db->getCell($columns['unidades']['entradas'] . $row)->getValue(),
                    'salidas' => $db->getCell($columns['unidades']['salidas'] . $row)->getValue(),
                    'existencia' => $db->getCell($columns['unidades']['existencia'] . $row)->getValue()
                ],
                'importes' => [
                    'inventario_inicial' => $db->getCell($columns['importes']['inventario_inicial'] . $row)->getValue(),
                    'entradas' => $db->getCell($columns['importes']['entradas'] . $row)->getValue(),
                    'salidas' => $db->getCell($columns['importes']['salidas'] . $row)->getValue(),
                    'inventario_final' => $db->getCell($columns['importes']['inventario_final'] . $row)->getValue()
                ],
                'error' => $db->getCell($columns['error'] . $row)->getValue()
            ];

            $data[] = $rowData;
        }

        return $data;
    }

    private static function extractTotals($db, $totalsRow)
    {
        return [
            'unidades' => [
                'inventario_inicial' => $db->getCell('F' . $totalsRow)->getValue(),
                'entradas' => $db->getCell('G' . $totalsRow)->getValue(),
                'salidas' => $db->getCell('H' . $totalsRow)->getValue(),
                'existencia' => $db->getCell('I' . $totalsRow)->getValue()
            ],
            'importes' => [
                'inventario_inicial' => $db->getCell('J' . $totalsRow)->getValue(),
                'entradas' => $db->getCell('K' . $totalsRow)->getValue(),
                'salidas' => $db->getCell('L' . $totalsRow)->getValue(),
                'inventario_final' => $db->getCell('M' . $totalsRow)->getValue()
            ]
        ];
    }

    private static function extractErrorMappings($db, $startRow, $endRow)
    {
        $errors = [];
        for ($row = $startRow; $row <= $endRow; $row++) {
            $errorText = $db->getCell('B' . $row)->getValue();
            if ($errorText) {
                preg_match('/\((\d+)\)\s*(.*)/', $errorText, $matches);
                if (isset($matches[1]) && isset($matches[2])) {
                    $errors[$matches[1]] = trim($matches[2]);
                }
            }
        }
        return $errors;
    }

    private static function extractNotes($db, $startRow, $endRow)
    {
        $notes = [];
        for ($row = $startRow; $row <= $endRow; $row++) {
            $note = $db->getCell('A' . $row)->getValue();
            if ($note) {
                $notes[] = $note;
            }
        }
        return $notes;
    }
}