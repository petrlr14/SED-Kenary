<?php
    
    include 'conn.php';

    if(isset($_GET['materia_id'])){
        $id_materia=$_GET['materia_id'];
        $dbconn=
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
         or die("Murio");
        $delete=pg_delete($dbconn, "tutoria", array('id_materia' => "$id_materia" ));
        $result=pg_delete($dbconn, "materia", array('id_materia' => "$id_materia" ));
        if($result){
            header('Location: https://kenary.nelsoncastro.me/sysadmin/materias.php');
            pg_close();
        }else{
            echo pg_last_error();
            pg_close();
        }
        echo $id_materia;
    }else{
        header('Location: https://kenary.nelsoncastro.me/materias.phpsysadmin/?argument=false');
    }

?>