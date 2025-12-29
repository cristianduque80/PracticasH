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

$VER = $con->query("SELECT `Id`, `Nombre`, `Apellido`, `Titulo`, `Objetivos`, `Descripcion`, `Fecha-Registro`, `Estado`, `Priorizacion` FROM `formulario` WHERE Estado= 'Aprobado' ORDER BY CASE `Priorizacion` WHEN 'Urgente' THEN 1 WHEN 'Alta' THEN 2 WHEN 'Media' THEN 3 WHEN 'Baja' THEN 4 END" );
$P_Rechazados = $con->query("SELECT `Id`, `Nombre`, `Apellido`, `Titulo`, `Objetivos`, `Descripcion`, `Fecha-Registro`, `Estado`, `Priorizacion` FROM `formulario` WHERE Estado= 'Rechazado' ");

if ($VER) {
    $Formulario = [];
    while ($fila_A = $VER->fetch_assoc()) {
        $Formulario[] = $fila_A;
    }
}

if ($P_Rechazados) {
    $Rechazo = [];
    while ($fila_R = $P_Rechazados->fetch_assoc()) {
        $Rechazo[] = $fila_R;
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
    <title>Caracas Software - Priorizacion de Proyectos</title>
</head>

<body>

    <div id="contenedor">

    <header class="Encabezado">
    <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
    <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4>
    </div><div class="Menu"><h1>Priorizacion de Proyectos</h1> </div>
    </header>
    
    <main>
    <hr>

    <h3 class="btn Volver">Proyectos Aprobados</h3>
    <div style="overflow-x: auto;">
        <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Objetivos</th>
            <th>Descripcion</th>
            <th>Fecha de Creacion</th>
            <th>Priorizacion</th>
            
        </tr></thead>
        <tbody></tbody>
        <?php foreach ($Formulario as $Decision): ?>
            <tr>
                <td><?php echo $Decision['Id']; ?></td>
                <td><?php echo $Decision['Titulo']; ?></td>
                <td><?php echo $Decision['Objetivos']; ?></td>
                <td onclick="mostrarVentana('<?php echo htmlspecialchars($Decision['Descripcion'], ENT_QUOTES); ?>')"><span style="color: rgb(37, 177, 196); cursor: pointer;">Ver descripción</span></td>
                <td><?php echo $Decision['Fecha-Registro']; ?></td>
                <td><?php echo $Decision['Priorizacion']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table></div>
    

    <h3 class="btn Salir">Proyectos Rechazados</h3>
    <div style="overflow-x: auto;">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Objetivos</th>
            <th>Descripcion</th>
            
        </tr></thead>
        <tbody>
        <?php foreach ($Rechazo as $Fallido): ?>
            <tr>
                <td><?php echo $Fallido['Id']; ?></td>
                <td><?php echo $Fallido['Titulo']; ?></td>
                <td><?php echo $Fallido['Objetivos']; ?></td>
                <td onclick="mostrarVentana('<?php echo htmlspecialchars($Fallido['Descripcion'], ENT_QUOTES); ?>')"><span style="color: rgb(37, 177, 196); cursor: pointer;">Ver descripción</span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table></div>
    
    <div id="Ventana">
    <p id="Ventana-texto"></p>
    <button onclick="cerrarVentana()" class="btn Salir">Cerrar</button>
    </div>
    <div id="Ventana-" onclick="cerrarVentana()"></div>
    
    <br />
    <!-- <h1> Trabajando en ello</h1><br />
    <img src="image/trabajando.png" alt="Trabajando" title="Trabajando" width="500" style="max-width:100%;height:auto;"><br /><br /><br /> -->
    <a href="Menu_Principal.php" class="btn Volver">Volver al Menu Principal</a>
    </main><br/>

    <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
    </div>

</body>
</html>