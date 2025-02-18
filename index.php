<?php
// Check if request is for a static file
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|ico|woff2?|ttf|eot|svg)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Let the server handle static files directly
}

// Route handling for non-static files
$route = trim($_SERVER['REQUEST_URI'], '/');
$_GET['ruta'] = $route ?: 'inicio';

require_once "Controladores/ctrl_plantilla.php";
require_once "Controladores/ctrl_alumno.php";
require_once "Controladores/ctrl_login.php";

$obj_plantilla = new ControladorPlantilla();
$obj_plantilla->CtrlPlantilla();