<?php

function conectar(){
$usuario = 'root'; 
$servidor= 'localhost';
$pass= '12345';
$db= 'caracas_software';

$con = mysqli_connect($servidor, $usuario, $pass, $db);
return $con;
}

function prueba($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
?>