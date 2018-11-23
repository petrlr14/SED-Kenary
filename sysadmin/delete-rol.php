<?php
    
    include 'conn.php';

    if(isset($_GET['rol_id'])){
        $id_rol=$_GET['rol_id'];
        $dbconn=
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
         or die("Murio");
        $delete=pg_delete($dbconn, "usuario", array('id_rol' => "$id_rol" ));
        $result=pg_delete($dbconn, "rol", array('id_rol' => "$id_rol" ));
        if($result){
            header('Location: https://kenary.nelsoncastro.me/sysadmin/roles.php');
            pg_close();
        }else{
            echo pg_last_error();
            pg_close();
        }
        echo $id_materia;
    }else{
        header('Location: https://kenary.nelsoncastro.me/sysadmin/roles.php/?argument=false');
    }

?>