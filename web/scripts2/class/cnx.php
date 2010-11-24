<?php
    function coneccion(){
        global $tipo_coneccion;
        require_once("adodb/adodb.inc.php");
        $host = "localhost";
        $nombre_base = "votainteligente_proyectos";
        $usuario_coneccion = "vota_p";
        $password_coneccion = "vota_754";
        $tipo_coneccion = "mysql";
        $conexion = ADONewConnection($tipo_coneccion);
        $conexion->Connect($host, $usuario_coneccion, $password_coneccion, $nombre_base);
        $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        error_reporting(0);
        return $conexion;
    }
    function pre($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
?>
