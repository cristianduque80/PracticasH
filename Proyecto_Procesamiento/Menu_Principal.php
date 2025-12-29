<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: Inicio_Seccion.php");
    exit();
}
$rol = $_SESSION['Rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="image/favicon.ico" type="image/x-icon" >
    <link rel="stylesheet" href="Diseño/Diseño.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracas Software - Menu Principal</title>
</head>
<body>

    <div id="contenedor">

   <header class="Encabezado">
    
    <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
    <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4>
    </div><div class="Menu"><h1>Menu Principal</h1> </div>
   </header>
 
   <main>
    <hr>

    <?php
    if ($rol == 'Admin') {
        echo '<a href="Registro.php" class="Boton_Menu_Principal">Gestionar Empleados</a><br/>';
        echo '<a href="Autorizacion.php" class="Boton_Menu_Principal">Autorizacion de Proyectos</a><br/>';
    } elseif ($rol == 'Comite') {
        echo '<a href="Autorizacion.php" class="Boton_Menu_Principal">Autorizacion de Proyectos</a><br/>';
    }?>

    <a href="Priorizacion.php"class="Boton_Menu_Principal">Priorizacion de Proyectos</a><br />

    <a href="Seguimiento.php"class="Boton_Menu_Principal">Seguimiento de Proyectos</a><br/>
    
    <a href="Formulario.php"class="Boton_Menu_Principal">Formulario de Proyectos</a> <br/>

    <a href="Usuario.php"class="Boton_Menu_Principal">Usuario</a><br/>

    <a href="Exit.php" style="background-color:red;" class="Boton_Menu_Principal">Cerrar Sesión</a>
   </main><br>

   <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
   </div>
</body>
</html>

