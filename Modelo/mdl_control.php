<?php
class Controlmdl {
  static public function mdlObtenerobservaciones($mat) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM controlalumnos WHERE Matricula = ?");
    $stmt->execute([$mat]);
    return $stmt->fetchAll();
  }

  static public function mdlGuardarobservaciones($obs, $mat) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO controlalumnos (fecha, observaciones, Matricula) VALUES (?, ?, ?)");
    $currDate = date('Y-m-d');
    $stmt->bindParam(1, $currDate);
    $stmt->bindParam(2, $obs);
    $stmt->bindParam(3, $mat);
    if ($stmt->execute()) {
        return "correcto";
    } else {
        return "error";
    }
  }
}