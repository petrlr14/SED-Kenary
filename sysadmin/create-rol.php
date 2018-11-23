<?php
    include 'conn.php';
    

    if(isset($_POST)){
        $nombre_rol=$_POST['nombre_rol'];
        $dbconn=
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
         or die("Murio");
        
        $resl=pg_query($dbconn,"INSERT INTO rol(nombre_rol) VALUES ('$nombre_rol');") or die(pg_last_error());

        if($resl){
            header('Location: https://kenary.nelsoncastro.me/sysadmin/roles.php');
            pg_close();
        }else{
            echo pg_last_error();
            pg_close();
        }
    }
    
    

?>