<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Practica 2</title>
</head>
<body>
    <form method="POST" action="practica1.php" class="input-group flex-nowrap" style="border:#;border-color:red;height:40px;width:100%"> 
        <label for="numeroA" class="input-group-text" id="addon-wrapping">Numero:</label>
        <input type="text" name="in_numeroA" id="numeroA" class="form-control" placeholder="A">
        <label for="numeroB" class="input-group-text" id="addon-wrapping">Rango:</label>
        <input type="text" name="in_numeroB" id="numeroB" class="form-control" placeholder="B">
        <label class="input-group-text" id="addon-wrapping">Operacion</label>
        <select name="operacion" class=form-select >
            <option selected>Selecione...</option>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicacion</option>
            <option value="division">Division</option>
        </select>
        <button name="btn1" class="btn btn-outline-secondary text-white" type="submit" id="button-addon1" style="background-color:#158C21">Enviar</button>
    </form>
    
<div class="container text-center" >
    <div class="row">
        <div class="col">
        </div>
        <div class="col">    
            <?php
                if(isset($_POST['btn1'])){
                    $numA = $_POST['in_numeroA'];
                    is_numeric($numA);
                    $numB = $_POST['in_numeroB'];
                    is_numeric($numB);
                    $operador = $_POST['operacion'];
                    
                    switch($operador){
                        case 'suma':
                            if((is_numeric($numA) && is_numeric($numB))==0){
                                echo"Introduzca un numero!!";
                            }else{
                                echo"<h3>SUMA</h3>";
                                suma($numA,$numB);
                            }
                            break;                
                        case 'resta':
                            if((is_numeric($numA) && is_numeric($numB))==0){
                                echo"Introduzca un numero!!";
                            }else{
                                echo"<h3>RESTA</h3>";
                                resta($numA,$numB);
                            }
                            break;   
                        case 'multiplicacion':
                            if((is_numeric($numA) && is_numeric($numB))==0){
                                echo"Introduzca un numero!!";
                            }else{
                                echo"<h3>MULTIPLICACION</h3>";
                                producto($numA,$numB);
                            }
                            break;   
                        case 'division':
                            if((is_numeric($numA) && is_numeric($numB))==0){
                                echo"Introduzca un numero!!";
                            }else{
                                echo"<h3>DIVISION</h3>";
                                div($numA,$numB);
                            }
                            break;   
                        default:
                            echo "Eliga un operador";
                    }
                
                }
            ///////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////*Funciones*/////////////////////////////////////////// 
            /////////////////////////////////////////////////////////////////////////////////////////    
            function suma($x,$y){
                echo "<table class=\"table\">";
                for($i=0;$i<=$y;$i++){
                    $resultado=number_format(($x+$i),2,",",".");
                    echo "<tr><td>$x+$i=$resultado</td></tr>";
                }
                echo "</table>";
            } 
            function resta($x,$y){
                echo "<table class=\"table\">";
                for($i=0;$i<=$y;$i++){
                    $resultado=number_format(($x-$i),2,",",".");
                    echo "<tr><td>$x-$i=$resultado</td></tr>";
                }
                echo "</table>";
            } 
            function producto($x,$y){
                echo "<table class=\"table\">";
                for($i=0;$i<=$y;$i++){
                    $resultado=number_format(($x*$i),2,",",".");
                    echo "<tr><td>".$x."x$i=$resultado</td></tr>";
                }
                echo "</table>";
            }  
            function div($x,$y){
                echo "<table class=\"table\">";
                for($i=1;$i<=$y;$i++){
                    $resultado=number_format(($x/$i),2,",",".");
                    echo "<tr><td>$x/$i=$resultado</td></tr>";
                }
                echo "</table>";
            }
            
            ///////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////
            ?>
        </div>
        <div class="col">
        </div>
    </div> 
</div>       
</body>
<style>
    /*.col{
        
        border:solid;
        border-color:red;
    }

    .container{
        width: 100%;
        border:solid;
        border-color:yellow;"
    }
    table{
        border:solid;
        border-color:red;
  
        text-align:center;
    
    }
    th{

        border:solid;
        border-color:green;
    }
     td{
        border:solid;
        border-color:green;
    }*/
</style>
</html>