<?php
class Conexion{
    static public function conectar(){
        //$enlace = new PDO("mysql:host=localhost; dbname=bdescolares","root","1976197720032006");
        $enlace = new PDO("mysql:host=localhost; dbname=7_lemi_bdescolares","root","alpine");
        $enlace->exec("set names utf8");
        return $enlace;
    }
}
