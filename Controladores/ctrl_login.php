<?php
require_once(realpath(__DIR__ . '/../Modelo/mdl_login.php'));
class LoginCtrl
{
    public static function login(): void
    {
        try {
            if (isset($_POST["txt_contrasena"])) {
                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_contrasena"])) {
                    $inputPassword = $_POST["txt_contrasena"];
                    $hashedPassword = LoginMdl::login();
                    if ($hashedPassword && password_verify($inputPassword, $hashedPassword)) {
                        $_SESSION["access"] = true;
                        Header("Location: /");
                    } else {
                        echo 'Contraseña incorrecta, por favor verifique e intente de nuevo.';
                    }
                }
            }
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
            error_log("Error en ctrlIngresoLogin: " . $e->getMessage());
        }
    }

    public static function logout($redirect = false): void
    {
        // Initialize session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Clear all session variables
        $_SESSION = [];

        // Delete the session cookie
        /*if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }*/

        // Destroy the session
        session_destroy();

        // Redirect using PHP instead of JavaScript
        if ($redirect) {
            echo "<script>window.location.replace('/');</script>";
        }
    }
}