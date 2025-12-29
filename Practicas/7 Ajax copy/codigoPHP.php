<?php
    include ('conexion_on.php');
    $type_function=$_POST['type_function'];
    echo'
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telf</th>
            </tr>
    ';
if($type_function==1){
    ////////////////////SELECCION DEL TIPO DE USUARIO//////////////////// 
    $user=$_POST['type_user'];
    if($user==1){$table=$table_db1;} /// 1->clientes 
    if($user==2){$table=$table_db2;} /// 2->empleados
    if($user==3){$table=$table_db3;} /// 3->administradores
    $consulta = mysqli_query($conex,"SELECT * FROM $table");
    list_on($consulta);
}
if($type_function==2){
    //////////////////////////////BUSQUEDA//////////////////////////////
    $my_search = $_POST['my_search'];
    $consulta = mysqli_query($conex,"SELECT * FROM $table_db1 WHERE nombre LIKE '%$my_search%'");
    list_on($consulta);
}


function list_on($consulta){
    while($data_consulta = mysqli_fetch_array($consulta)){
    echo'
        <tr>
            <td>'.$data_consulta['id'].'</td>
            <td>'.$data_consulta['nombre'].'</td>
            <td>'.$data_consulta['apellido'].'</td>
            <td>'.$data_consulta['telefono'].'</td>
        </tr>
    ';
    }
}


    echo "</table>";



