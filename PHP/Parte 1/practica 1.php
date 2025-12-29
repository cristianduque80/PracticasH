<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>

    <?php
    #Mostrar en pantalla echo
    echo    "Mostrar en pantalla(echo):  ";
    echo    "Hola";
    echo    "<br>";
    echo    "Como estas";
    echo    "<br>"; echo "<br>";
    
    #Ver tipo de variable
    echo    "Viendo tipo de variable: ";
    echo    "<br>";
    echo    var_dump(1);
    echo    "<br>";
    echo    var_dump(1.8);
    echo    "<br>";
    echo    var_dump("hola");
    echo    "<br>";
    echo    var_dump(true);
    echo    "<br>"; echo    "<br>";
    
    #Uniendo dos cadenas
    echo    "Uniendo dos o mas cadenas: ";
    $a =    "Hola, uni";
    $b =    "dos";
    $c =    "tres";
    $d =    "cuatro";
    $e =    "cadenas";
    echo    "<br>";
    echo    "$a $b $e con comillas dobles \" \" ";
    echo    "<br>";
    echo    $a.' '.$b.' '.$e. ' con comillas simples  \' \'';
    echo    "<br>"; echo    "<br>";

    #Probando las funciones de los STR
    $prueba = 'Hola mundo, pero esta vez en PHP'; $prueba2="1234"; $matriz = explode(" ",$prueba);
    echo "Probando las funciones STRING: ";
    echo  "<br>";
    echo "\$prueba = $prueba";
    echo  "<br>";
    echo "1.Tamaño del string usando strlen: ".strlen($prueba);
    echo  "<br>";
    echo "2.Recuento de palabras usando str_word_count: ".str_word_count($prueba); 
    echo  "<br>";
    echo "3.Encontrando la palabra PHP usando strpos en: \$prueba ---> Posicion del primer caracter de la palabra: ".strpos("Hola mundo, pero esta vez en PHP", "PHP");
    echo  "<br>";
    echo "4.Mayuscula con strtoupper: ".strtoupper($prueba)."<br>\tMinuscula con strtolower: ".strtolower($prueba);
    echo  "<br>";
    echo "5.Remplezar la palabra Hola->Adios con str_replace: ".str_replace("Hola","Adios",$prueba);
    echo  "<br>";
    echo  "6.Invierto la cadena \$prueba2 = $prueba2 -> ".strrev($prueba2);
    echo "<br>";
    echo "7.Convierto la cadena de \$prueba en matriz: "; print_r($matriz); #usar print_r para poder observar la matriz¡¡¡
    echo "<br>";echo "<br>";
    
    #Segmentando la cadena
    echo "Segmentando cadenas: ";
    echo "<br>";
    echo substr($prueba,0,10);
    echo "<br>";
    echo substr($prueba,5);
    echo "<br>";
    echo substr($prueba,0,-10);
    echo "<br>";echo "<br>";

   
?>

</body>
</html>

