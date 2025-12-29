<?php
    //Creacion de la variable global -> sesion_estado
        session_start();
        ob_start();
        $_SESSION['sesion_estado']=0;

        $user = $_POST['user_sesion'];
        $pass = $_POST['pass_sesion'];
        
        //Determinar las entradas de inicio de sesion
        if(strlen($user)<=0 || strlen($pass)<=0){
            $_SESSION['sesion_estado']=2; //2 -> Error de campo vacio
        }else{
            //Comprobacion que el usuario este registrado en la base de datos
            include("conexion_db.php");
            $_SESSION['sesion_estado']=3; //3 -> Error usuario no encontrado
            $consulta_sesion=mysqli_query($conex, "SELECT * FROM $table2 WHERE '$user' = usuario and '$pass' =contraseña");
            while($dato_consultado=mysqli_fetch_array($consulta_sesion)){
                $_SESSION['sesion_estado']=1; //1 -> Sesion iniciada
            } include('cerrar_conexion_db.php');
        }
        
        if($_SESSION['sesion_estado']!=1){
            header("location:sesion.php");
        }else{
        header("location:formulario.php");
        }   
        
?>