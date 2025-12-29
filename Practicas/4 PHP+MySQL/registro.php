<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Combinar PHP con MySQL</title>
</head>
<body>
    <h1 class="text-center display-4">Propietario</h1>
    <form class="container" action="registro.php" method="POST">
        <div class="row">
            <div class="col"></div>
            <div id="inf" class="col">
                <div class="mb-3">
                    <label for="documento">Documento</label>
                    <input class="form-control" type="number" name="in_documento" id="documento"> 
                </div>

                <div class="mb-3 input-group">
                    <span class="input-group-text" ><label for="nombre">Nombre</label></span>
                    <input class="form-control" type="text" name="in_nombre" id="nombre">  
                    <span class="input-group-text" ><label for="apellido">Apellido</label></span>
                    <input class="form-control" type="text" name="in_apellido" id="apellido">
                            
                </div>

                <div class="mb-3">
                    <label for="direccion">Dirección: </label>
                    <input class="form-control" type="text" name="in_direccion" id="direccion">  
                </div>   

                <div class="mb-3">
                    <label for="telefono">Telefono:</label>
                    <input class="form-control" type="number" name="in_telefono" id="telefono" style="appearance:textfield">                    
                </div>  

                <div class="mb-3 text-center">
                    <button name="btn1" type="submit" class="btn btn-primary">Enviar</button>  
                </div>        
            </div>
            <div class="col"></div>
        </div>
    </form>
<?php
if(isset($_POST['btn1'])){
    
    include 'abrir_conexion.php';
    echo "se insertaron correctamente";
    $cedula = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $conexion->query("INSERT INTO $tabla_db1 (cedula,nombre,direccion,telefono,apellido) values('$cedula','$nombre','$direccion','$telefono','$apellido')");

    include 'cerrar_conexion.php';
    
}
?>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }

    
</style>  
</body>
</html>