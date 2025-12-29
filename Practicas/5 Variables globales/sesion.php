<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="estilos.css" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
<?php
        session_start();
        ob_start();
        if($_SESSION['sesion_estado']==2){
            echo"
            <script>alert('Rellene los campos solicitados');</script>
            ";
        }else if($_SESSION['sesion_estado']==3){
            echo "
            <script>alert('Usted no se encuentra registrado');</script>
            ";
        }
    ?>
<div class="main">
    <div class="formulario">
        <img src="img\SERVIDUROC CA.png" alt="">
        <div class="Inputs ps-3 pe-3">
            <form method="post" action="validacion_sesion.php">
                <div class="input-group mb-3">
                    <span class="input-group-text"><label for="id_nombre">Nombre:</label></span>
                    <input class="form-control" type="text" name="user_sesion" id="id_nombre">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><label for="id_contraseña">Contraseña:</label></span>
                    <input class="form-control" type="text" name="pass_sesion" id="id_contraseña">
                </div>  
                <div class="container text-center">
                    <button type="submit" name="btn1" class="btn btn-success mb-3">Registrar</button>
                    <button type="submit" name="btn2" class="btn btn-danger mb-3">Salir</button>
                </div>                      
            </form>  
        </div> 
    </div> 
</div>

</body>
</html>
