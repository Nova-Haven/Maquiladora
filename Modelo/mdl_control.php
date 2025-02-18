<?php
class Controlmdl
{
  public static function mdlObtenerobservaciones($mat)
  {
    $db = Conexion::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM controlalumnos WHERE Matricula = ?");
    $stmt->execute([$mat]);
    return $stmt->fetchAll();
  }

  public static function mdlGuardarobservaciones($obs, $mat)
  {
    $db = Conexion::getInstance()->getConnection();
    $stmt = $db->prepare("INSERT INTO controlalumnos (fecha, observaciones, Matricula) VALUES (?, ?, ?)");
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