<?php
// Check if request is for a static file
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|ico|woff2?|ttf|eot|svg)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Let the server handle static files directly
}
if (!file_exists('.env')) {
    try {
        $key = base64_encode(random_bytes(32));
        file_put_contents('.env', "CACHE_ENCRYPTION_KEY=$key");
    } catch (Exception $e) {
        error_log("Error creating .env file: " . $e->getMessage());
        throw $e;
    }
}

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Route handling for non-static files
$route = trim($_SERVER['REQUEST_URI'], '/');
$_GET['ruta'] = $route ?: '/';

require_once "Controladores/ctrl_plantilla.php";
require_once "Controladores/ctrl_login.php";

$obj_plantilla = new ControladorPlantilla();
$obj_plantilla->CtrlPlantilla();