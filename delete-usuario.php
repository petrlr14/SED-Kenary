<?php
    
    session_start();

    if(!$_SESSION['logged']){
        session_destroy();
        header('Location: https://kenary.nelsoncastro.me');
    }else{
        if($_SESSION['expire']<=time()){
            session_destroy();
            header('Location: https://kenary.nelsoncastro.me?timeout=true');
        }
    }
    
    include 'conn.php';

    if(isset($_GET['user_id'])){
        $id_user=$_GET['user_id'];
        $dbconn=
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
         or die("Murio");
        $delete=pg_delete($dbconn, "tutoria", array('id_usuario' => "$id_user" ));
        $result=pg_delete($dbconn, "usuario", array('id_usuario' => "$id_user" ));
        if($result){
            header('Location: https://kenary.nelsoncastro.me/usuarios.php');
            pg_close();
        }else{
            echo pg_last_error();
            pg_close();
        }
        echo $id_user;
    }else{
        header('Location: https://kenary.nelsoncastro.me/usuarios.php?argument=false');
    }

?>