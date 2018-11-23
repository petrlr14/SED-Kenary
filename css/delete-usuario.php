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

    $id=$_GET['user_id'];

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
     or die("Murio");

    $result=pg_query($dbconn, "DELETE FROM usuario WHERE id_usuario = '$id'");
    
?>