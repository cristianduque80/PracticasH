<?php
    //Conexion db
    include("conexion_db.php");

    //1.-Funcion de incersion de datos
    if(isset($_POST['btn2'])){
        //Comprobacion de los campos (inputs)
        if(strlen($_POST['nombre'])<=0 || strlen($_POST['apellido'])<=0 || strlen($_POST['cedula'])<=0 || strlen($_POST['email'])<=0 || strlen($_POST['telefono'])<=0){
            echo "
                <div class=\"container-lg text-center\" style=\"\">   
                    ---Rellene los campos faltantes---                       
                </div>
            ";
        }else{
            if(substr_count($_POST['email'],"@")>=2 or substr_count($_POST['email']," ")>=1) {
                echo "
                <div class=\"container-lg text-center\" style=\"\">   
                    ---Formato de correo invalido---                       
                </div>
            ";
            }else{
                $cedula=$_POST['cedula'];
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $email=$_POST['email'];
                $telefono=$_POST['telefono'];
                $guardado="INSERT INTO $table(cedula, nombre, apellido, email, telefono) VALUES ('$cedula','$nombre','$apellido','$email','$telefono')";
                
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
                }
            }
        }  
    }

    //2.-Funcion de consulta de datos
    if(isset($_POST['btn3'])){
        //Comprobacion del campo (inputs)
        if(strlen($_POST['cedula'])<=0){
            $cedula=$_POST['cedula'];
            $consulta=mysqli_query($conex,"SELECT * FROM $table");
            while($dato_consultado=mysqli_fetch_array($consulta)){
                echo "
                <table class=\"table table-sm mb-0\">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                    </tr>
                    <tr>
                        <td width=\"15%\">".$dato_consultado['nombre']."</td>
                        <td width=\"15%\">".$dato_consultado['apellido']."</td>
                        <td width=\"53%\">".$dato_consultado['email']."</td>
                        <td>".$dato_consultado['telefono']."</td>
                    </tr>
                </table>";
            }include("cerrar_conexion_db.php");    
        }else{
            $cedula=$_POST['cedula'];
            $consulta=mysqli_query($conex,"SELECT * FROM $table WHERE cedula='$cedula'");
            while($dato_consultado=mysqli_fetch_array($consulta)){
                echo "
                <table class=\"table\">
                    <tr >
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                    </tr>
                    <tr>
                        <td width=\"15%\">".$dato_consultado['nombre']."</td>
                        <td width=\"15%\">".$dato_consultado['apellido']."</td>
                        <td width=\"53%\">".$dato_consultado['email']."</td>
                        <td>".$dato_consultado['telefono']."</td>
                    </tr>
                </table>";
            }include("cerrar_conexion_db.php");    
        }
    }

    //3.- Funcion para volver al inicio de sesion
    if(isset($_POST['btn4'])){
        header("location:sesion.php");
    }


