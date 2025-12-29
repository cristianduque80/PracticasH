<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Fomulario</title>
</head>
<body>
    <div class="container-lg ">
        <center><h1 class="display-3">Formulario</h1></center>
        <div class="row">
            <div class=col></div>
            <div id="form" class="col-8">
                <form action="page.php" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><label for="id_nombre">Nombre</label></span>
                        <input type="text" name="nombre" id="id_nombre" class="form-control">
                        
                        <span class="input-group-text"><label for="id_apellido">Apellido</label></span>
                        <input type="text" name="apellido" id="id_apellido" class="form-control">
                    </div>
                    <div class="input-group mb-0">
                        <span class="input-group-text"><label for="id_cedula">Cedula</label></span><input type="number" name="cedula" class="form-control" id="id_cedula">
                    </div>
                    <div class="form-text mb-3 mt-0">Para la consulta unicamente rellene este campo</div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><label for="id_numero">Telefono</label></span><input type="number" name="telefono" class="form-control" id="id_numero">                    
                    </div>
                    <div class="container text-center mb-2">
                        <button type="submit" name="btn2" class="btn btn-success">Enviar</button>
                        <button type="submit" name="btn3" class="btn btn-primary">Consultar</button>
                        <button type="submit" name="btn5" class="btn btn-warning">Actualizar</button> 
                        <button type="submit" name="btn6" class="btn btn-danger">Eliminar</button>
                        <button type="submit" name="btn4" class="btn btn-secondary">Regresar</button>
                    </div>
                </form>
                <?php
                    include("registro.php");
                ?> 
            </div>
            <div class=col></div>
        </div>
    </div> 
</body>

<style>
    span{
        width: 80px;
    }

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
</html>