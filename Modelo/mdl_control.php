<?php
class Controlmdl {
        static public function mdlObtenerobservaciones() {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM controlalumnos");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    
        static public function mdlGuardarobservaciones($datoss) {
            $stmt = Conexion::conectar()->prepare("INSERT INTO controlalumnos (observaciones) 
                                                  VALUES (:observaciones)");
            $stmt->bindParam(":observaciones", $datoss["observaciones"], PDO::PARAM_STR);  
            if ($stmt->execute()) {
                return "correcto";
            } else {
                return "error";
            }
        }
}