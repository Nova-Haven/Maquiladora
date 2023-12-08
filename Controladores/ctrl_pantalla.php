<?php
class PantallaCtrl {
    static public function ctrlIngresoPantalla() {
        
        if (isset($_POST["txt_contrasena"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_contrasena"])) {
                $valor = $_POST["txt_contrasena"];
                $result = PantallaMdl::mdlMostrar( $valor);
                if ($result["contrasena"] == $_POST["txt_contrasena"]) {
                    $_SESSION["pantalla"] = "activa";
                    echo '<script>window.location="inicio";</script>';
                } else {
                    
                    echo 'mal';
                }
            }
        }
    }
}