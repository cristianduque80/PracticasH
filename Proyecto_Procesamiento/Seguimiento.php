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

$VER = $con->query("SELECT * FROM formulario");

if ($VER) {
    $Formulario = [];
    while ($fila = $VER->fetch_assoc()) {
        $Formulario[] = $fila;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="image/favicon.ico" type="image/x-icon" >
    <link rel="stylesheet" href="Diseño/Diseño.css">
    <script src="Comportamiento/Comportamiento.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracas Software - Seguimiento de Proyectos</title>
</head>
<body>

    <div id="contenedor">
    <header class="Encabezado">
    <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
    <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4>
    </div><div class="Menu"><h1>Seguimiento de Proyectos</h1> </div>
    </header>
    
    <main>
    <hr>

     <h3>Lista de Proyectos</h3>
     
    <div style="overflow-x: auto;"><table><thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Titulo</th>
            <th>Objetivos</th>
            <th>Fecha de Creacion</th>
            <th>Descripcion</th>

        </tr></thead><tbody>
        <?php foreach ($Formulario as $Proyectos): ?>

            <tr>
                <td><?php echo $Proyectos['Id']; ?></td>
                <td><?php echo $Proyectos['Nombre']; ?></td>
                <td><?php echo $Proyectos['Apellido']; ?></td>
                <td><?php echo $Proyectos['Titulo']; ?></td>
                <td><?php echo $Proyectos['Objetivos']; ?></td>
                <td><?php echo $Proyectos['Fecha-Registro']; ?></td>
                <td onclick="mostrarVentana('<?php echo htmlspecialchars($Proyectos['Descripcion'], ENT_QUOTES); ?>')"><span style="color: rgb(37, 177, 196); cursor: pointer;">Ver descripción</span></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table></div>

<div id="Ventana">
    <p id="Ventana-texto"></p>
    <button onclick="cerrarVentana()" class="btn Salir">Cerrar</button>
</div>
<div id="Ventana-" onclick="cerrarVentana()"></div>
 
    <br>
    <!-- <h1> Trabajando en ello</h1><br />
    <img src="image/trabajando.png" alt="Trabajando" title="Trabajando" width="500" style="max-width:100%;height:auto;"><br /><br /><br /> -->
    <a href="Menu_Principal.php" class="btn Volver">Volver al Menu Principal</a></main><br/>

    <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
    </div>

</body>
</html>