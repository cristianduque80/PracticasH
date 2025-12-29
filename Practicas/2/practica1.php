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
        <label for="numeroA" class="input-group-text" id="addon-wrapping">Numero (A):</label>
        <input type="text" name="in_numeroA" id="numeroA" class="form-control" placeholder="A">
        <label for="numeroB" class="input-group-text" id="addon-wrapping">Numero (B):</label>
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
    <table>
        <tr>
            <th>Operaciones</th>
            <th>Tabla de multiplicar Numero A</th>
            <th>Tabla de multiplicar Numero B</th>
        </tr>
        <tr>
            <td>
                <?php
                    if(isset($_POST['btn1'])){
                        $numA = $_POST['in_numeroA'];
                        is_numeric($numA);
                        $numB = $_POST['in_numeroB'];
                        is_numeric($numB);
                        $operador = $_POST['operacion'];
                        
                        if((is_numeric($numA) && is_numeric($numB))!=1){
                            echo "Introduzca un numero";
                        }else{
                            switch($operador){
                            case 'suma':
                                $resultado=$numA+$numB;
                                echo "La suma de $numA + $numB es $resultado";
                                break;
                            case 'resta':
                                $resultado=$numA-$numB;
                                echo "La resta de $numA - $numB es $resultado";
                                break;
                            case 'multiplicacion':
                                $resultado=$numA*$numB;
                                echo "La multiplicacion de $numA x $numB es $resultado";
                                break;
                            case 'division':
                                $resultado=number_format(($numA/$numB),2,",",".");
                                echo "La division de $numA / $numB es $resultado";
                                break;
                            default:
                                echo "Eliga un operador";
                        }
                        }   
                    }
                ?>
            </td>
            <td>
                <?php
                    if(isset($_POST['btn1'])){
                        $numA = $_POST['in_numeroA'];
                        is_numeric($numA);
                            if(is_numeric($numA)!=1){
                            echo "Introduzca un numero";
                            }else{
                                for($i=0;$i<=10;$i++){
                                    $resultado = $i * $numA;
                                    echo "$i x $numA = $resultado<br>";
                                }

                            }
                    }
                ?>
            </td>
            <td>
                <?php
                    if(isset($_POST['btn1'])){
                        $numA = $_POST['in_numeroB'];
                        is_numeric($numB);
                            if(is_numeric($numB)!=1){
                            echo "Introduzca un numero";
                            }else{
                                for($i=0;$i<=10;$i++){
                                    $resultado = $i * $numB;
                                    echo "$i x $numB = $resultado<br>";
                                }

                            }
                    }
                ?>
            </td>
        </tr>
    </table>
    
</body>
<style>
    table{
        border:solid;
        border-color:red;
        margin-top:10px;
        text-align:center;
        width: 100%;
    }
    th{
        width: 32%;
        border:solid;
        border-color:green;
    }
     td{
        border:solid;
        border-color:green;
    }
</style>
</html>