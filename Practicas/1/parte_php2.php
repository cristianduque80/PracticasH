<?php
/////////////////////////////////////
//------------Practica_2-----------//
/////////////////////////////////////
$numero_a = $_POST['Na'];
$numero_b = $_POST['Nb'];
$operacion = $numero_a * $numero_b;
$raiz = number_format(sqrt($numero_a),2,",",".");

echo "El resultado de $numero_a x $numero_b es: $operacion<br>";
echo "La raiz del numero $numero_a es: $raiz<br>";
if($numero_a>$numero_b){
    echo "El numero $numero_a es mayor que el $numero_b<br>";
}elseif($numero_a==$numero_b){
    echo "El numero $numero_a es igual que el $numero_b<br>";
}else{
    echo "El numero $numero_a es menor que el $numero_b<br>";
}
echo "<br>Tabla del numero: $numero_a <br>";
for($i=0;$i<=10;$i++){
    $multiplicacion = $i * $numero_a;
    echo "$i x $numero_a = $multiplicacion <br>";
}
echo "Tabla del numero: $numero_b <br>";
for($i=0;$i<=10;$i++){
    $multiplicacion = $i * $numero_b;
    echo "$i x $numero_b = $multiplicacion <br>";
}
?>