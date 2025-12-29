<?php
session_start();
if (!isset($_SESSION['Usuario']) || ($_SESSION['Rol'] != 'Admin')) {
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
        $Usuario = prueba($_POST['Usuario']);
        $Contraseña = prueba($_POST['Contraseña']);
        $Email = prueba($_POST['Email']);
        $Rol = prueba($_POST['Rol']);
        $Departamento= prueba($_POST['Departamento']);
        
        $crear= $con->prepare("INSERT INTO `registro` (`Nombre`, `Apellido`, `Usuario`, `Contraseña`, `Email`, `Rol`, `Departamento`)VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        try {
        $crear->execute([$Nombre,$Apellido,$Usuario,$Contraseña,$Email,$Rol,$Departamento]);
        echo "<script>alert('✅ Empleado creado con éxito');window.location.href='Registro.php';</script>";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {// 1062 es un error de codigo para entradas duplicas 
        echo "<script>alert('🚫Usuario ingresado existe, validar');window.location.href='Registro.php';</script>";
        } else {
            echo "Database error: " . $e->getMessage();}   
    }}

    if (isset($_POST['Buscar'])) {
        $Nombre = prueba($_POST['Nombre']?? "");
        $Apellido = prueba($_POST['Apellido']?? "");
        $Rol = prueba($_POST['Rol']?? "");
        $Departamento= prueba($_POST['Departamento']?? "");
        
        $condiciones = [];
        $parametros = [];
        $tipos ="";
        
        if (!empty($Nombre)) {
        $condiciones[] = "Nombre LIKE ?";
        $parametros[] = $Nombre . "%";  // Buscardor por el inicio de $nombre 
        $tipos .= "s"; 
        }
 
        if (!empty($Apellido)) {
            $condiciones[] = "Apellido LIKE ?";
            $parametros[] = $Apellido . "%";
            $tipos .= "s";
        }
        if (!empty($Rol)) {
            $condiciones[] = "Rol = ?";
            $parametros[] = $Rol;
            $tipos .= "s";
        }
        if (!empty($Departamento)) {
            $condiciones[] = "Departamento = ?";
            $parametros[] = $Departamento;
            $tipos .= "s";
        }
        if (!empty($condiciones)) {
        $sql = "SELECT * FROM registro WHERE " . implode(" AND ", $condiciones);
        $Busqueda = $con->prepare($sql);
        $Busqueda->bind_param($tipos,...$parametros);
        $Busqueda->execute();
        $resultado = $Busqueda->get_result();

        $BUSQUEDA = [];
        while ($fila = $resultado->fetch_assoc()) {
            $BUSQUEDA[] = $fila;
        }
        } else {
            $mensaje = "Por favor, completa al menos un campo para buscar la informacion.";
        }  
    }

    if (isset($_POST['Eliminar'])) {
        $Id = prueba($_POST['Id']);
        $eliminar = $con->prepare("DELETE FROM registro WHERE Id = ?");
        $eliminar->execute([$Id]);
        echo "<script>alert('✅ Eliminación éxitosa');window.location.href='Registro.php';</script>"; 
    }

    if (isset($_POST['Editar'])) {
        $Id = prueba($_POST['Id']);
        $Usuario = prueba($_POST['Usuario']);
        $Rol = prueba($_POST['Rol']);

        if (!empty($_POST['Contraseña'])) {
            $Contraseña = prueba($_POST['Contraseña']);
            $modificar = $con->prepare("UPDATE registro SET Usuario = ?, Contraseña = ?, Rol = ? WHERE Id = ?");
            $modificar->execute([$Usuario, $Contraseña, $Rol, $Id]);
        } else {
            $modificar = $con->prepare("UPDATE registro SET Usuario = ?, Rol = ? WHERE Id = ?");
            $modificar->execute([$Usuario, $Rol, $Id]);
        } 
        echo "<script>alert('✅ Modificación éxitosa');window.location.href='Registro.php';</script>"; 
    }
}

$VER = $con->query("SELECT * FROM registro");
$empleados = [];
while ($fila = $VER->fetch_assoc()) {
        $empleados[] = $fila;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="image/favicon.ico" type="image/x-icon" >
    <link rel="stylesheet" href="Diseño/Diseño.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracas Software - Registro de Empleados</title>
</head>

<body>  
    
    <div id="contenedor">

    <header class="Encabezado">
     <div class="Logo-Bienvenida">
    <a href="Menu_Principal.php"> <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"></a>
     <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?></h4></div>
     <div class="Menu"><h1>Gestión de Empleados</h1> </div>
    </header>

    <main>
     <hr>
     <h3>Agregar Empleados</h3>
     <form method="POST">
        <input type="text" name="Nombre" placeholder="Nombre" required>
        <input type="text" name="Apellido" placeholder="Apellido" required>
        <input type="text" name="Usuario" placeholder="Usuario" required>
        <input type="text" name="Contraseña" placeholder="Contraseña" required>
        <input type="text" name="Email" placeholder="Email" required>
        
        <select name="Rol" required>
            <option value="" disabled selected hidden>Rol</option>
            <option value="Admin">Admin</option>
            <option value="Comite">Comite</option>
            <option value="Usuario">Usuario</option>
        </select>

        <select name="Departamento" required>
            <option value="" disabled selected hidden>Departamento</option>
            <option value="Directiva">Directiva</option>
            <option value="Sistemas">Sistemas</option>
            <option value="Ventas">Ventas</option>
            <option value="Finanzas">Finanzas</option>
        </select>

        <button type="submit" name="Agregar" class="btn Registro" style="margin-bottom: 20px" >Agregar</button>
     </form>

     <hr>
     <h3>Buscar Empleados</h3>
     <form method="POST">
        <input type="text" name="Nombre" placeholder="Nombre" >
        <input type="text" name="Apellido" placeholder="Apellido" >

        <select name="Rol" >
            <option value="" disabled selected hidden>Rol</option>
            <option value="Admin">Admin</option>
            <option value="Comite">Comite</option>
            <option value="Usuario">Usuario</option>
        </select>

        <select name="Departamento" >
            <option value="" disabled selected hidden>Departamento</option>
            <option value="Directiva">Directiva</option>
            <option value="Sistemas">Sistemas</option>
            <option value="Ventas">Ventas</option>
            <option value="Finanzas">Finanzas</option>
        </select>
        
        <button type="submit" name="Buscar" class="btn Registro" style="margin-bottom: 20px" >Buscar</button>
     </form>
    
     <?php if (!empty($mensaje)): ?><p style="color: red;"><?php echo $mensaje; ?></p><?php endif; ?>

     <?php if (!empty($BUSQUEDA)): ?>
     <div style="overflow-x: auto;">
     <table>
         <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Departamento</th>
                <th>Acciones (Editar/ELiminar)</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($BUSQUEDA as $EMPLEADO): ?>
                <tr>
                    <td><?php echo $EMPLEADO['Id']; ?></td>
                    <td><?php echo $EMPLEADO['Nombre']; ?></td>
                    <td><?php echo $EMPLEADO['Apellido']; ?></td>
                    <td><?php echo $EMPLEADO['Usuario']; ?></td>
                    <td><?php echo "********"; ?></td>
                    <td><?php echo $EMPLEADO['Email']; ?></td>
                    <td><?php echo $EMPLEADO['Rol']; ?></td>
                    <td><?php echo $EMPLEADO['Departamento']; ?></td>

                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" style="margin-bottom:2px;" value="<?php echo $EMPLEADO['Id']; ?>">
                        <input type="text" name="Usuario" style="margin-bottom:5px;" value="<?php echo prueba($EMPLEADO['Usuario']); ?>" required><br />
                        <input type="password" name="Contraseña" placeholder="Nueva contraseña (Opcional)">
                        <select name="Rol">
                            <option value="Admin" >Admin</option>
                            <option value="Comite">Comite</option>
                            <option value="Usuario">Usuario</option>
                        </select><br />
                        <button type="submit" name="Editar" class="btn Registro">Editar</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" value="<?php echo $EMPLEADO['Id']; ?>">
                        <button type="submit" name="Eliminar" class="btn Salir">Eliminar</button>
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
         </tbody>
    </table>
     </div>

     <?php elseif (isset($_POST['Buscar']) && empty($mensaje)): ?>
     <p style="color: red;">No se encontraron resultados con los criterios ingresados.</p><?php endif; ?>

     <hr>
     <h3>Lista de Empleados</h3>
     <div style="overflow-x: auto;">
     <table>
        <thead><tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Departamento</th>
            <th>Acciones (Editar/ELiminar)</th>
        </tr></thead>
         <tbody>
          <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?php echo $empleado['Id']; ?></td>
                <td><?php echo $empleado['Nombre']; ?></td>
                <td><?php echo $empleado['Apellido']; ?></td>
                <td><?php echo $empleado['Usuario']; ?></td>
                <td><?php echo "********"; ?></td>
                <td><?php echo $empleado['Email']; ?></td>
                <td><?php echo $empleado['Rol']; ?></td>
                <td><?php echo $empleado['Departamento']; ?></td>

                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" style="margin-bottom:2px;" value="<?php echo $empleado['Id']; ?>">
                        <input type="text" name="Usuario" style="margin-bottom:5px;" value="<?php echo prueba($empleado['Usuario']); ?>" required><br />
                        <input type="password" name="Contraseña" placeholder="Nueva contraseña (Opcional)">
                        <select name="Rol">
                            <option value="Admin" >Admin</option>
                            <option value="Comite">Comite</option>
                            <option value="Usuario">Usuario</option>
                        </select><br />
                        <button type="submit" name="Editar" class="btn Registro">Editar</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="Id" value="<?php echo $empleado['Id']; ?>">
                        <button type="submit" name="Eliminar" class="btn Salir">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
     </table>
     </div>
     <br>
     <a href="Menu_Principal.php" class="btn Volver" >Volver al Menu Principal</a>
    </main><br/>

    <footer><h6>&copy; HERNANDEZ DUQUE <?php echo date("Y");?></h6></footer>
    </div>
</body>
</html>