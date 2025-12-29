<?php
session_start();
include ("Conexion_DB.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con = conectar();
    $Usuario = $Contraseña = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Usuario = prueba($_POST['Usuario']);
    $Contraseña = prueba($_POST['Contraseña']);

    $Obtener = $con->prepare("SELECT * FROM registro WHERE Usuario = ?");
    $Obtener->bind_param("s", $Usuario);  
    $Obtener->execute();
    $resultado = $Obtener->get_result();
    $datos = $resultado->fetch_assoc();

    if ($Contraseña === $datos['Contraseña']) {
    
     $_SESSION['Usuario_id'] = $datos['Id'];
     $_SESSION['Nombre'] = $datos['Nombre'];
     $_SESSION["Apellido"] = $datos["Apellido"];   
     $_SESSION["Usuario"] = $datos["Usuario"];
     $_SESSION['Contraseña'] = $datos['Contraseña'];
     $_SESSION['Email'] = $datos['Email'];
     $_SESSION['Rol'] = $datos['Rol'];
     $_SESSION['Departamento'] = $datos['Departamento'];
     
     header("Location: Menu_Principal.php");
     exit();
        
    }else {
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='Inicio_Seccion.php';</script>";;
    }
    }
} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>