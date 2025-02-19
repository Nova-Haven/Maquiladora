<?php
class Conexion
{
    private static $instance = null;
    private $spreadsheet;
    private $activeSheet;
    protected const EXCEL_FILE = __DIR__ . '/../data/InventarioFormex.xlsx';
    private const LOCAL_DB = __DIR__ . '/../data/db.sqlite';

    private function __construct()
    {
        try {
            // Create data directory if it doesn't exist
            $dataDir = dirname(self::EXCEL_FILE);
            if (!file_exists($dataDir)) {
                mkdir($dataDir, 0755, true);
            }

            // Ensure database and Excel file exist
            if (!file_exists(self::EXCEL_FILE)) {
                throw new Exception("Excel file not found");
            } else {
                $this->spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(self::EXCEL_FILE);
                $this->activeSheet = $this->spreadsheet->getActiveSheet();
            }

        } catch (Exception $e) {
            error_log("Excel connection failed: " . $e->getMessage());
            throw $e;
        }
    }

    public function getFilename()
    {
        return $this::EXCEL_FILE;
    }

    public function getDbFilename()
    {
        return $this::LOCAL_DB;
    }

    public static function ensureConnection(): void
    {
        try {
            if (!file_exists(__DIR__ . '/../.env')) {
                throw new Exception("Environment file not found");
            }
            if (!file_exists(self::LOCAL_DB) || !is_readable(self::LOCAL_DB)) {
                throw new Exception("Database file not found");
            }
            if (!file_exists(self::EXCEL_FILE) || !is_readable(self::EXCEL_FILE)) {
                throw new Exception("Excel file not found");
            }
        } catch (Exception $e) {
            error_log("Connection failed: " . $e->getMessage());
            throw $e;
        }
    }

    public static function initializeDatabase()
    {
        if (!file_exists(self::LOCAL_DB)) {
            LoginCtrl::logout(false);
            $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
            $sqlFile = __DIR__ . '/../data/prep.sqlite.sql';

            if ($isWindows) {
                $sqlite = __DIR__ . '/../bin/sqlite3.exe';
                if (!file_exists($sqlite)) {
                    throw new Exception("SQLite executable not found");
                }
                exec("\"$sqlite\" \"" . self::LOCAL_DB . "\" < \"$sqlFile\"", $output, $returnCode);
            } else {
                // Unix-like systems (Mac, Linux)
                exec("sqlite3 \"" . self::LOCAL_DB . "\" < \"$sqlFile\"", $output, $returnCode);
            }

            if ($returnCode !== 0) {
                throw new Exception("Failed to initialize database");
            } else {
                return true;
            }
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSpreadsheet()
    {
        return $this->spreadsheet;
    }

    public function getActiveSheet()
    {
        return $this->activeSheet;
    }

    public function getDatabase()
    {
        return new PDO("sqlite:" . self::LOCAL_DB);
    }

    private function saveSpreadsheet()
    {
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($this->spreadsheet, 'Xlsx');
        $writer->save(self::EXCEL_FILE);
    }

    public function query($range)
    {
        return $this->activeSheet->rangeToArray($range);
    }

    public function insert($data)
    {
        $nextRow = $this->activeSheet->getHighestRow() + 1;
        $this->activeSheet->fromArray([$data], null, 'A' . $nextRow);
        $this->saveSpreadsheet();
    }

    public function update($row, $data)
    {
        $this->activeSheet->fromArray([$data], null, 'A' . $row);
        $this->saveSpreadsheet();
    }

    public function delete($row)
    {
        $this->activeSheet->removeRow($row);
        $this->saveSpreadsheet();
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
}