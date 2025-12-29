<?php
    /////////////////////////////////////////////////////////
    //Control de error --> Acceso de usuarios
    // 1 --> Validado
    // 2 --> No hay existencia de usuario
    // 3 --> Campos de entrada vacios
    ////////////////////////////////////////////////////////
    session_start();
    ob_start();
    $_SESSION['estado_user']=0;

    if(strlen($_POST['usuario'])<=0 || strlen($_POST['contraseña'])<=0){
        $_SESSION['estado_user']=3;
    }else{
        include('conexion_on.php');
        $_SESSION['estado_user']=2;
        $contraseña=$_POST['contraseña'];
        $usuario=$_POST['usuario'];
        $consulta=mysqli_query($conex,"SELECT * FROM $table1 WHERE usuario='$usuario' AND contraseña='$contraseña'");
        while($dato_consultado=mysqli_fetch_array($consulta)){
            $_SESSION['estado_user']=1;
        }include('conexion_off.php');
    }
    if($_SESSION['estado_user']==1){
        header("location:page.php");
    }else{
        header("location:main.php");
    }


