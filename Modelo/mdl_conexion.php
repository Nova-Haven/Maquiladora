<?php
class Conexion
{
    private static $instance = null;
    private $spreadsheet;
    private $activeSheet;
    private const EXCEL_FILE = __DIR__ . '/../data/database.xlsx';

    private function __construct()
    {
        try {
            require_once __DIR__ . '/../vendor/autoload.php';

            // Create data directory if it doesn't exist
            $dataDir = dirname(self::EXCEL_FILE);
            if (!file_exists($dataDir)) {
                mkdir($dataDir, 0755, true);
            }

            // Create new Excel file if it doesn't exist
            if (!file_exists(self::EXCEL_FILE)) {
                $this->spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
                $this->activeSheet = $this->spreadsheet->getActiveSheet();
                // Set up initial headers
                $this->activeSheet->fromArray([
                    [
                        'Producto',
                        'Nombre',
                        'Método',
                        'Costeo',
                        'Inventario Inicial',
                        'Entradas',
                        'Salidas',
                        'Existencia',
                        'Inventario Final',
                        'Error'
                    ]
                ]);
                $this->saveSpreadsheet();
            } else {
                $this->spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(self::EXCEL_FILE);
                $this->activeSheet = $this->spreadsheet->getActiveSheet();
            }

        } catch (Exception $e) {
            error_log("Excel connection failed: " . $e->getMessage());
            throw $e;
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