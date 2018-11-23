<?php
    include 'conn.php';
    
    if(isset($_POST)){
        $materia=$_POST['id_materia'];
        $usuario=$_POST['id_usuario'];
        $dbconn=
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
         or die("Murio");
        
        $resl=pg_query($dbconn,"INSERT INTO tutoria(id_materia, id_usuario) VALUES($materia, $usuario);") or die(pg_last_error());

        if($resl){
            header('Location: https://kenary.nelsoncastro.me/sysadmin/materias.php');
            pg_close();
        }else{
            echo pg_last_error();
            pg_close();
        }
    }else{
        header('Location: https://kenary.nelsoncastro.me/sysadmin/materias.php?error=true');
    }
    
?>