<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo strtoupper("condicionales<br>");
        /*Ejercicio 1
        Escribe un programa en PHP que reciba la edad de una persona y determine en qué categoría se encuentra según las siguientes reglas:
            Niño: 0 a 12 años.
            Adolescente: 13 a 17 años.
            Adulto: 18 a 64 años.
            Adulto mayor: 65 años o más.
        */ 
        $edad=65;

        if($edad<=12){
            $categoria = "niño";
        }
        elseif($edad<=17){
            $categoria = "adolescente";
        }
        elseif($edad<=64){
            $categoria = "Adulto";
        }
        else{
            $categoria = "Adulto mayor";
        }
        
        echo $categoria;
    ?>
</body>
</html>