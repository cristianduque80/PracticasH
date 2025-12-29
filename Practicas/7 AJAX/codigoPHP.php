<?php
    include("conexion_on.php");

    echo "
        <table class=\"table\">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
    </tr>
    ";

    //CONSULTA
    $action=$_POST['action'];

    if($action==1){
        $button_select=$_POST['button_select'];

        if($button_select==1){$table=$table_db1;}
        if($button_select==2){$table=$table_db2;}
        if($button_select==3){$table=$table_db3;}
        $consulta=mysqli_query($conex,"SELECT * FROM $table");
        table_consulta($consulta);
    }
    elseif($action==2){
        $my_search=$_POST['my_search'];
        $consulta=mysqli_query($conex,"SELECT * FROM $table_db1 WHERE nombre LIKE '%$my_search%'");
        table_consulta($consulta);
        
    }

    function table_consulta($consulta){
        while($dato_consultado=mysqli_fetch_array($consulta)){
            echo '
                <tr>
                    <td>'.$dato_consultado['id'].'</td>
                    <td>'.$dato_consultado['nombre'].'</td>
                    <td>'.$dato_consultado['apellido'].'</td>
                    <td>'.$dato_consultado['telefono'].'</td>
                </tr>
            '; 
        }

    }    

    echo "
        </table>
    ";