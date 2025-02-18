<?php
require_once __DIR__ . '/Modelo/mdl_conexion.php';

try {
    $db = Conexion::getInstance();
    $db->processNewExports();
} catch (Exception $e) {
    error_log("Export processing failed: " . $e->getMessage());
}