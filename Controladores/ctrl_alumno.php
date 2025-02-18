<?php
class ClienteCtrl
{

    public static function ctrlGuardarCliente()
    {
        if (isset($_POST["txt_nombre"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/', $_POST["txt_nombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/', $_POST["txt_appaterno"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/', $_POST["txt_apmaterno"]) &&
                preg_match('/^[0-9]+$/', $_POST["txt_numero"])
            ) {
                $datos = array("Nombre" => $_POST["txt_nombre"], "Appaterno" => $_POST["txt_appaterno"], "Apmaterno" => $_POST["txt_apmaterno"], "Numero" => $_POST["txt_numero"]);
                $respuesta = Alumnomdl::mdlGuardarAlumno($datos);
                if ($respuesta == "correcto") {
                    echo '<script> windows.location="clientes"; </script>';
                }
            } else {

            }
        }
    }

}
