<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: Menu_Principal.php");
    exit();
}
include ("Conexion_DB.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con = conectar();
    } catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['Agregar'])) {
        $Nombre = prueba($_POST['Nombre']);
        $Apellido = prueba($_POST['Apellido']);
        $Titulo = prueba($_POST['Titulo']);
        $Objetivos = prueba($_POST['Objetivos']);
        $Descripcion = prueba($_POST['Descripcion']);
        $Fecha_Registro = date("Y-m-d");
        $Estado = "Pendiente Por Decision Del Comite";

        $crear= $con->prepare("INSERT INTO `formulario`(`Nombre`, `Apellido`, `Titulo`, `Objetivos`, `Descripcion`, `Fecha-Registro`, `Estado`)VALUES (?, ?, ?, ?, ?, ?, ?)");
        $crear->execute([$Nombre,$Apellido,$Titulo,$Objetivos,$Descripcion,$Fecha_Registro, $Estado]);
        echo "<script>alert('✅ Formulario creado con éxito'); window.location.href='Menu_Principal.php';</script>";
    }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="image/favicon.ico" type="image/x-icon" >
    <link rel="stylesheet" href="Diseño/Diseño.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracas Software - Formulario de Proyectos</title>
     <style>
        
        .Formulario{
            width: 80%;
            margin: 20px auto;
            padding: 5px;
            border: 2px solid #262645;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0px 0px 5px rgba(26, 26, 45, 0.76);
            font-family: Arial, sans-serif;
            font-size: 18; 
            max-width: 600px;}

        input, textarea {
            width: 70%;
            padding:10px;
            margin: 1px 1px 1px 5px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;}

    </style>
</head>
<body>
    <div id="contenedor">
    <header class="Encabezado">
    <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
    <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4>
    </div><div class="Menu"><h1>Formulario de Proyectos</h1> </div>
    </header>
    
    <main>
    <hr>

    <h3>Agregar Proyecto</h3>

    <div class="Formulario"><form method="POST">
        <input type="hidden" name="Nombre" value="<?php echo $_SESSION['Nombre']; ?>" required>
        <input type="hidden" name="Apellido" value="<?php echo $_SESSION['Apellido']; ?>" required>
        <h4>Titulo</h4>
        <input type="text" name="Titulo" placeholder="Titulo del Proyecto (Max. 50)" style="width: 80%; text-align: center;" maxlength="50" required><br />
        <h4>Objetivos</h4>
        <input type="text" name="Objetivos" placeholder="Objetivo del Proyecto (Max. 50)" style="width: 80%; text-align: center;" maxlength="50" required><br />
        <h4>Descripcion</h4>
        <textarea name="Descripcion" placeholder="Metodología, Alcance, Herramientas, Presupuesto y Duración Estimada del Proyecto" rows= "10" cols="8" style="width: 90%; resize: none; font-family: Arial, sans-serif; text-align:justify; margin-bottom: 20px"required></textarea><br />
        

        <button type="submit" name="Agregar" class="btn Registro" style="margin-bottom: 20px">Agregar Formulario</button><br />
    </form> </div>
    <!-- <h1> Trabajando en ello</h1><br /> -->
    <!-- <img src="image/trabajando.png" alt="Trabajando" title="Trabajando" width="500" style="max-width:100%;height:auto;"><br /><br /><br /> -->
    <a href="Menu_Principal.php" class="btn Volver">Volver al Menu Principal</a>
    </main><br/>

    <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
    </div>


</body>
</html>