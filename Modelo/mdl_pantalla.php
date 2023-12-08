<?php
require_once "mdl_conexion.php";
class PantallaMdl {
    static public function mdlMostrar($valor) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM pantalla WHERE contrasena = :contrasena");
        $stmt->bindParam(":contrasena", $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetch();
    }
}

