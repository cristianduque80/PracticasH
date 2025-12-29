<?php
    //Parametros a configurar para la conexion a la base de datos
    $host="localhost"; //Valor de nuestra base de datos
    $basededatos="condominio"; //Valor de nuestra base de datos
    $usuariodb="cristian";//Valor de nuestra base de datos
    $clasedb="12345";//Valor de nuestra base de datos

    //Lista de tablas
    $tabla_db1="propietario"; //tabla de usuarios

    error_reporting(0);

    $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

    if ($conexion->connect_errno){
        echo "Error!!";
        exit();
    }
?>