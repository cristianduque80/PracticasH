<?php
//Conexion db
    include("conexion_on.php");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//----------------1.-Funcion de incersion de datos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['btn2'])){
        //Comprobacion de los campos (inputs)
        if(strlen($_POST['nombre'])<=0 || strlen($_POST['apellido'])<=0 || strlen($_POST['cedula'])<=0 || strlen($_POST['telefono'])<=0){
            echo "
                <div class=\"container-lg text-center\" style=\"\">   
                    ---RELLENE LOS CAMPOS FALTANTES---                       
                </div>
            ";
        }else{
                $cedula=$_POST['cedula'];
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $telefono=$_POST['telefono'];
                $guardado="INSERT INTO $table2(cedula, nombre, apellido, telefono) VALUES ('$cedula','$nombre','$apellido','$telefono')";
                
                $estado=mysqli_query($conex,$guardado);
                if($estado){
                    echo "
                    <div class=\"container-lg text-center\" style=\"\">   
                    ---Datos enviados correctamente---                       
                    </div>
                ";
                }else{echo "
                    <div class=\"container-lg text-center\" style=\"\">   
                    ---Eror de conexion---                       
                    </div>
                ";
                }include("conexion_off.php");
            }
    }  
   
        
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//----------------2.-Funcion de consulta de datos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['btn3'])){
        //Comprobacion del campo (inputs)
        if(strlen($_POST['cedula'])<=0){
            $consulta=mysqli_query($conex,"SELECT * FROM $table2");
            while($dato_consultado=mysqli_fetch_array($consulta)){
                echo "
                <table class=\"table table-sm mb-0 text-center\">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                    </tr>
                    <tr>
                        <td>".$dato_consultado['nombre']."</td>
                        <td>".$dato_consultado['apellido']."</td>
                        <td>".$dato_consultado['telefono']."</td>
                    </tr>
                </table>";
            }include("conexion_off.php");    
        }else{
            $cedula=$_POST['cedula'];
            $consulta=mysqli_query($conex,"SELECT * FROM $table2 WHERE cedula='$cedula'");
            $i=0;
            while($dato_consultado=mysqli_fetch_array($consulta)){
                echo "
                <table class=\"table text-center\">
                    <tr >
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                    </tr>
                    <tr>
                        <td>".$dato_consultado['nombre']."</td>
                        <td>".$dato_consultado['apellido']."</td>
                        <td>".$dato_consultado['telefono']."</td>
                    </tr>
                </table>";
                $i++;
            }
            if($i==0){
                echo "<div class=\"container-lg text-center\" style=\"\">   
                    ---USUARIO NO ENCONTRADO---                       
                    </div>";  
            }include("conexion_off.php");    
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//----------------3.- Funcion para volver al inicio de sesion
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['btn4'])){
        header("location:main.php");
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//----------------4.- Funcion para actualizar datos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['btn5'])){
        if(strlen($_POST['nombre'])<=0 || strlen($_POST['apellido'])<=0 || strlen($_POST['cedula'])<=0 || strlen($_POST['telefono'])<=0){
            echo "
                <div class=\"container-lg text-center\" style=\"\">   
                    ---RELLENE LOS CAMPOS FALTANTES---                       
                </div>
            ";
        }else{
            $comp=0;
            $cedula=$_POST['cedula'];
            $consulta = mysqli_query($conex,"SELECT * FROM $table2 WHERE cedula='$cedula'");
            while($dato_consultado=mysqli_fetch_array($consulta)){
                $comp=1;
            }
            if($comp!=1){
                echo "<div class=\"container-lg text-center\" style=\"\">   
                    ---USUARIO NO ENCONTRADO---                       
                    </div>";
            }else{
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $telefono=$_POST['telefono'];
                $_UPDATE="UPDATE $table2 SET nombre='$nombre',apellido='$apellido',telefono='$telefono' WHERE cedula='$cedula'";
                $consulta=mysqli_query($conex,$_UPDATE);
                if($consulta){
                    echo "<div class=\"container-lg text-center\" style=\"\">   
                    ---DATOS ACTUALIZADOS CORRECTAMENTE---                       
                    </div>";
                }include("conexion_off.php");
            }
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//----------------4.- Funcion para eliminar datos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['btn6'])){
        if(strlen($_POST['cedula'])<=0){
            echo "<div class=\"container-lg text-center\" style=\"\">   
                    ---RELLENE EL CAMPO \"CEDULA\" PARA ELIMINAR---                       
                </div>";
        }else{
            $comp=0;
            $cedula = $_POST['cedula'];
            $consulta=mysqli_query($conex,"SELECT * FROM $table2 WHERE cedula='$cedula'");
            while($dato_consultado=mysqli_fetch_array($consulta)){
                $comp=1;
            }
            if($comp!=1){
                echo "<div class=\"container-lg text-center\" style=\"\">   
                    ---USUARIO NO ENCONTRADO---                       
                    </div>";
            }else{
                $_DELETE = "DELETE FROM $table2 WHERE cedula=$cedula";
                $consulta=mysqli_query($conex,$_DELETE);
                if($consulta){
                    echo "<div class=\"container-lg text-center\" style=\"\">   
                    ---DATOS ELIMINADOS CORRECTAMENTE---                       
                    </div>";
                }include("conexion_off.php");
            }
        }
    }