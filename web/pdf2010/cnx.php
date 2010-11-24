<?php
    function coneccion(){
        global $tipo_coneccion;
        require_once("adodb/adodb.inc.php");
        $tipo_coneccion = "mysql";
        $conexion = ADONewConnection("mysql");
        $conexion->Connect("localhost", "pdf2010", "qwerty123456", "pdf2010");
        $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        //error_reporting(E_ALL & ~E_NOTICE);
        error_reporting(E_ALL);
        return $conexion;
    }
    function pre($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
?>
