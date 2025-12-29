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
      
      if (isset($_POST['Modificar_Usuario'])) {
        $Id = prueba($_POST['Id']);
        $Usuario = prueba($_POST['Usuario']);
        $modificar = $con->prepare("UPDATE registro SET Usuario = ? WHERE Id = ?");
        
        try {
        $modificar->execute([$Usuario, $Id]);
        $_SESSION["Usuario"] = $Usuario;
        echo "<script>alert('✅ Modificacion de Usuario Guardada');window.location.href='Menu_Principal.php';</script>";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
        echo "<script>alert('🚫Usuario ingresado existe en la plataforma. No se pueden tener empleados con el mismo usuario');window.location.href='Usuario.php';</script>";
        } else {
            echo "Database error: " . $e->getMessage();
        }
        
    } }

      if (isset($_POST['Modificar_Contraseña'])) {
        $Id = prueba($_POST['Id']);
        $Contraseña = prueba($_POST['Contraseña']);

        $modificar = $con->prepare("UPDATE registro SET Contraseña = ? WHERE Id = ?");
        $modificar->execute([$Contraseña, $Id]);

        echo "<script>alert('✅ Modificacion de Contraseña Guardada');window.location.href='Menu_Principal.php';</script>";

      }

    }      

$VER = $con->prepare("SELECT * FROM registro WHERE Usuario = ?");
$VER->bind_param("s", ($_SESSION['Usuario']));  
$VER->execute();
$resultado = $VER->get_result();
    
if ($resultado) {
    $User = [];
    while ($fila = $resultado->fetch_assoc()) {
        $User[] = $fila;
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
    <title>Caracas Software - Usuario</title>
</head>
<body>

    <div id="contenedor" >
    <header class="Encabezado">   
    <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
    <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4>
    </div>
    <div class="Menu"><h1>Informacion del Usuario</h1> </div>
    </header>
    
    <main>
    <hr>

    <h3>Empleado <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h3>
    <div style="overflow-x: auto;">
    <table class="Usuario"><thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Departamento</th>
        </tr></thead><tbody>
        <?php foreach ($User as $empleado): ?>
            <tr>
                <td><?php echo $empleado['Id']; ?></td>
                <td><?php echo $empleado['Nombre']; ?></td>
                <td><?php echo $empleado['Apellido']; ?></td>

                <td>
                    
                <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" style="margin-bottom:2px;" value="<?php echo $empleado['Id']; ?>">
                        <input type="text" name="Usuario" style="text-align:center;"value="<?php echo prueba($empleado['Usuario']); ?>" required><br />
                        <button type="submit" name="Modificar_Usuario" class="btn Registro Modificar">Modificar</button>
                </form>
                    
                </td>
                <td>
                <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" style="margin-bottom:2px;" value="<?php echo $empleado['Id']; ?>">
                        <input type="password" name="Contraseña" style="text-align:center;" value="<?php echo prueba($empleado['Contraseña']); ?>" required><br />
                        <button type="submit" name="Modificar_Contraseña" class="btn Registro Modificar">Modificar</button>
                </form>
                </td>

                <td><?php echo $empleado['Email']; ?></td>
                <td><?php echo $empleado['Rol']; ?></td>
                <td><?php echo $empleado['Departamento']; ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <br>

    <a href="Menu_Principal.php" class="btn Volver">Volver al Menu Principal</a>
    </main><br>

    <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
    </div>

</body>
</html>

