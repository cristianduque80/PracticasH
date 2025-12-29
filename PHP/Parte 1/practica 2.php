<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        #Comprobar si un numero es entero o no
        echo "Comprobar si un numero es entero o no: ";
        $numero1=250;
        $numero2=12.5;
        echo "<br>";
        echo var_dump (is_int($numero1));
        echo "<br>";
        echo var_dump (is_int($numero2));
        echo "<br>";echo "<br>";

        #Operaciones
        $operacion1=$numero1+$numero2;
        $operacion2=$numero2+pi();
        $operacion3;
        $operacion4;
        $operacion5;
        echo "Operaciones matematicas:";
        echo "<br>";
        echo "$numero1+$numero2 = ".$operacion1.var_dump(is_int($operacion1));
        echo "<br>";
        echo round($operacion2,3);
    ?>
</body>
</html>