<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
<div id="contenedor_principal" class="container text-center p-0">
    <div id="form_sesion">
        <h4 class="mt-3">Inicio</h4>
        <div id="form_usuario" class="mb-4">
            <form action="validacion_usuario.php" method="post">
                <div id="form_id" class="input-group-sm mb-2">
                    <label for="id_usario"><b>Usuario</b></label>
                    <input class="form-control" type="text" name="usuario" id="id_usario">
                </div>
                <div id="form_pass" class="input-group-sm mb-2">
                    <label for="id_pass"><b>Contraseña</b></label>
                    <input class="form-control" type="password" name="contraseña" id="id_pass">
                </div>
                <div id="form_buttons" class="container text-center">
                    <button name="btn1" class="btn btn-success" type="submit">Enviar</button>
                    <button name="btn2" class="btn btn-danger" type="reset">Eliminar</button>
                </div>
                <div id="form_mensaje" class="text-center">
                <?php
                 session_start();
                    if (isset($_SESSION['estado_user'])) {
                        //$estado = (int) $_SESSION['estado_user'];
                        if ($_SESSION['estado_user']==2) {
                            echo '<h2>USUARIO NO ENCONTRADO</h2>';
                        } elseif ($_SESSION['estado_user']==3) {
                            echo '<h2>RELLENE LOS CAMPOS SOLICITADOS</h2>';
                        }
                        unset($_SESSION['estado_user']);
                    }
                ?>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>