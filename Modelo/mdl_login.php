<?php
require_once "mdl_conexion.php";
class LoginMdl
{
    public static function login()
    {
        try {
            $db = Conexion::getInstance()->getDatabase();

            // Use password hash column instead of plain text
            $stmt = $db->prepare("SELECT pwd FROM login LIMIT 1");
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['pwd'] : false;

        } catch (PDOException $e) {
            // Don't expose error details to client
            error_log("Error en mdlMostrar: " . $e->getMessage());
            return false;
        }
    }
}

