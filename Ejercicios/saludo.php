<?php
    $numero_A = $_POST['numero_A'];
    $numero_B = $_POST['numero_B'];
    //$operacion = $numero_A+$numero_B;
    //echo "el resultado es: $operacion";
    $z = operacion($numero_A,$numero_B) ;
    
    echo "El resultado de la operacion A+B es: $z";

    function operacion($A,$B){
        $resultado = $A+$B;
        return $resultado;
    }


   
?>