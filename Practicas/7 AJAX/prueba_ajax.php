<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Prueba Ajax</title>

</head>

<body>
    <div class="container text-center">
        <h2>PLATAFORMA DE CONTROL</h2>
        <div class="row align-items-center mt-3 mb-3">
            <div class="col">
                <button class="btn btn-primary" type="submit" onclick="saludame(1)">Clientes</button>
            </div>
            <div class="col">
                <button class="btn btn-primary" type="submit" onclick="saludame(2)">Empleados</button>
            </div>
            <div class="col">
                <button class="btn btn-primary"type="submit" onclick="saludame(3)">Administrador</button>
            </div>
        </div>
        <h3>TABLA DE DATOS</h3>
        <div class="text-center"id="mostrar_mensaje">            
        </div>
    </div>
    
    <script>
        function saludame(boton){ 
            var parametro={
                "datos_select": boton,
            }

            $.ajax({
                data: parametro,
                url: 'codigoPHP.php',
                type: 'POST',
                
                beforesend: function()
                {
                $('#mostrar_mensaje').html("Mensaje antes de Enviar");
                },

                success: function(mensaje)
                {
                $('#mostrar_mensaje').html(mensaje);
                }
            });
        }
    </script>
</body>

</html>