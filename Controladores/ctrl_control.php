<?php
class ControlCtrl {

    static public function ctrlGuardarObser(){
        if(isset($_POST["txt_obs"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["txt_obs"])){
                $datoss = array("observaciones"=>$_POST["txt_obs"]);
                $respuesta = Controlmdl::mdlGuardarobservaciones($datoss);
                if($respuesta == "correcto"){
                    echo'<script> windows.location="clientes"; </script>';
                }
            }else{
                
            }
        }
    }

}
