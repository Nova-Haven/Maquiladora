<?php
class Conexion
{
    private static $instance = null;
    private $connection;
    private const DB_FILE = __DIR__ . '/../data/db.sqlite';
    private const WATCH_DIR = __DIR__ . '/../data/incoming';
    private const PROCESSED_DIR = __DIR__ . '/../data/processed';
    private const FAILED_DIR = __DIR__ . '/../data/failed';


    private function __construct()
    {
        try {
            if (!extension_loaded('pdo_sqlite')) {
                throw new Exception("SQLite PDO extension is not loaded");
            }

            // Create necessary directories
            foreach ([dirname(self::DB_FILE), self::WATCH_DIR, self::PROCESSED_DIR, self::FAILED_DIR] as $dir) {
                if (!file_exists($dir)) {
                    mkdir($dir, 0755, true);
                }
            }

            // Create db directory if it doesn't exist
            $dbDir = dirname(self::DB_FILE);
            if (!file_exists($dbDir)) {
                mkdir($dbDir, 0755, true);
            }

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 5
            ];

            $this->connection = new PDO(
                "sqlite:" . self::DB_FILE,
                null,
                null,
                $options
            );

            // Enable foreign keys
            $this->connection->exec('PRAGMA foreign_keys = ON');
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
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

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public static function ensureConnection()
    {
        try {
            $db = self::getInstance()->getConnection();
            return $db;
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            // You might want to redirect to an error page or show a user-friendly message
            throw new Exception("Database connection failed. Please try again later.");
        }
    }

    // Add new method to check for new files
    public function processNewExports()
    {
        try {
            $files = glob(self::WATCH_DIR . '/*.xlsx');

            foreach ($files as $file) {
                $processed = false;

                try {
                    if (!file_exists($file)) {
                        continue;
                    }

                    // Get file lock to prevent concurrent processing
                    $lock = fopen($file . '.lock', 'w');
                    if (!flock($lock, LOCK_EX | LOCK_NB)) {
                        continue; // File is being processed by another instance
                    }

                    // Process the file here
                    require_once __DIR__ . '/../vendor/autoload.php';
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                    $worksheet = $spreadsheet->getActiveSheet();

                    $this->connection->beginTransaction();

                    // Clear existing data if needed
                    $this->connection->exec('DELETE FROM infoalumnos');

                    // Process each row
                    foreach ($worksheet->getRowIterator(2) as $row) {
                        // Assuming column order matches your database schema
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);
                        $data = [];
                        foreach ($cellIterator as $cell) {
                            $data[] = $cell->getValue();
                        }

                        // Insert into SQLite
                        $stmt = $this->connection->prepare("INSERT INTO infoalumnos VALUES (?,?,?,?,?,?,?,?,?,?)");
                        $stmt->execute($data);
                    }

                    $this->connection->commit();
                    $processed = true;

                } catch (Exception $e) {
                    if ($this->connection->inTransaction()) {
                        $this->connection->rollBack();
                    }
                    error_log("Failed processing {$file}: " . $e->getMessage());
                } finally {
                    if (isset($lock)) {
                        flock($lock, LOCK_UN);
                        fclose($lock);
                        unlink($file . '.lock');
                    }

                    // Move file to appropriate directory
                    $targetDir = $processed ? self::PROCESSED_DIR : self::FAILED_DIR;
                    $newPath = $targetDir . '/' . basename($file);
                    rename($file, $newPath);
                }
            }
        } catch (Exception $e) {
            error_log("File processing error: " . $e->getMessage());
            throw $e;
        }
    }

    // Prevent cloning of the instance
    private function __clone()
    {
    }

    // Prevent unserialize
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
}