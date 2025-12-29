<?php
session_start();
if ((!isset($_SESSION['Usuario'])) || ($_SESSION['Rol'] != 'Admin' && $_SESSION['Rol'] != 'Comite') ) {
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
    if (isset($_POST['Decision_del_Proyecto'])) {
        $Id = prueba($_POST['Id']);
        $Decision = prueba($_POST['Decision']);
        $Priorizacion = prueba($_POST['Priorizacion']);
           
        if (!empty($Decision)) {
                if($Decision == "Rechazado"){
                    $Toma = $con->prepare("UPDATE formulario SET Estado = ? WHERE Id = ?");
                    $Toma->execute([$Decision, $Id]);
                    echo "<script>alert('✅ Decision Guardada');window.location.href='Menu_Principal.php';</script>";
                } 
                elseif(!empty($Priorizacion)){
                    $Toma = $con->prepare("UPDATE formulario SET Estado = ?, Priorizacion = ? WHERE Id = ?");
                    $Toma->execute([$Decision,$Priorizacion, $Id]);
                    echo "<script>alert('✅ Decision Guardada');window.location.href='Menu_Principal.php';</script>";
                }else {
                    echo "<script>alert('🚫 Si desea aprobar el proyecto, colocar la PRIORIZACION');window.location.href='Autorizacion.php';</script>";
                }
        }else {
            echo "<script>alert('🚫 Si desea aprobar o rechazar el proyecto, por favor complete la informacion solicitada');window.location.href='Autorizacion.php';</script>";
        }
    }     
}

$VER = $con->query("SELECT `Id`, `Titulo`, `Objetivos`, `Descripcion`, `Fecha-Registro`, `Estado` FROM `formulario` WHERE Estado = 'Pendiente Por Decision Del Comite' ");

$Formulario = [];
while ($fila = $VER->fetch_assoc()) {
    $Formulario[] = $fila;
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
    <title>Caracas Software - Panel de Evaluacion</title>

</head>
<body>
    
    <div id="contenedor">

    <header class="Encabezado">
    <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
    <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4>
    </div><div class="Menu"><h1>Gestion de Proyectos</h1> </div>
    </header>
    
    <main>
    <hr>
    <h3>La aprobación de un proyecto estará condicionada al estricto cumplimiento de todas las políticas de factibilidad establecidas.</h3>
    <img src="image/politicas_de_factibilidad.png" alt="Politicas de Factibilidad" title="Politicas de Factibilidad" width="400" style="max-width:100%;height:auto;">
    <hr>
    <h3>Lista de Proyectos por Aprobacion</h3>
    <?php if (!empty($Formulario)): ?>
    <div style="overflow-x: auto;">
    <table>
        <thead><tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Objetivos</th>
            <th>Descripcion</th>
            <th>Fecha de Creacion</th>
            <th>Estado</th>
            <th>Priorizacion</th>
            <th>Accion</th>
          
        </tr></thead>

        <?php foreach ($Formulario as $Decision): ?>
          <tbody><tr>
                <td><?php echo $Decision['Id']; ?></td>
                <td><?php echo $Decision['Titulo']; ?></td>
                <td><?php echo $Decision['Objetivos']; ?></td>
                <td onclick="mostrarVentana('<?php echo htmlspecialchars($Decision['Descripcion'], ENT_QUOTES); ?>')"><span style="color: rgb(37, 177, 196); cursor: pointer;">Ver descripción</span></td>
                <td><?php echo $Decision['Fecha-Registro']; ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" style="margin-bottom:2px;" value="<?php echo $Decision['Id']; ?>">
                        <select name="Decision">
                            <option value="" disabled selected hidden>Opciones</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Rechazado">Rechazado</option>
                        </select>
                </td>
                <td>
                        <select name="Priorizacion">
                            <option value="" disabled selected hidden>Opciones</option>
                            <option value="Urgente">Urgente</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select><br />
                </td>
                <td>
                    <button type="submit" name="Decision_del_Proyecto" class="btn Registro">Decision Del Comite</button>
                </td>
                </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div><br>

    <?php else: ?>
     <p style="color: red;">No se encontraron proyectos por revision.</p><?php endif; ?>

     <div id="Ventana">
    <p id="Ventana-texto"></p>
    <button onclick="cerrarVentana()" class="btn Salir">Cerrar</button>
    </div>
    <div id="Ventana-" onclick="cerrarVentana()"></div>

    <!-- <h1> Trabajando en ello</h1><br />
    <img src="image/trabajando.png" alt="Trabajando" title="Trabajando" width="500" style="max-width:100%;height:auto;"><br /><br /><br /> -->
    <a href="Menu_Principal.php" class="btn Volver">Volver al Menu Principal</a>
    </main><br/>

    <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
    </div>

</body>
</html>