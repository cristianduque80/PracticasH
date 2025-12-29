<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracas Software - Registro</title>
    <style>
        body {
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: white;
        }
        .Inicio_de_sesion {
            background: white;
            border: 2px solid #262645;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(26, 26, 45, 0.76);
            width: 280px;
            text-align: center;
        }
        input {
            width: 100%;
            padding:10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input:focus {border: 2px solid #3498db;  box-shadow: 0 0 5px rgba(52,152,219,0.3);  }
        button {
            width: 100%;
            padding: 10px;
            background-color:powderblue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {background-color:#3498db;}
        h6{color: #262645;}
    </style>
</head>
<body>
    <div class="Inicio_de_sesion">
        <img src="image/caracas-logo.png" alt="Caracas Software Logo" title="Caracas Software Logo" width="100" style="max-width:100%;height:auto;"><br>
        <h2>Iniciar Sesión</h2>
        <form action="Acceso.php" method="POST">
            <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" required>
            <input type="password" id="Contraseña" name="Contraseña" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
            <h6>&copy; HERNANDEZ DUQUE <?php  
            echo date("Y");?></h6>
        </form>
    </div>
    </body>
</html>