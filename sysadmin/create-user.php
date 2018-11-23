<?php
    include 'conn.php';
    
    if(isset($_POST)){
        $nombre_usuario=$_POST['nombre_usuario'];
        $correo=$_POST['correo_usuario'];
        $password_usuario=strtoupper(hash('sha256', $_POST['password_usuario']));
        $edad=$_POST['edad_usuario'];
        $id_rol=$_POST['id_rol'];
        $id_genero=$_POST['id_genero'];
        $dbconn=
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
         or die("Murio");
        
        $resl=pg_query($dbconn,"INSERT INTO usuario(id_genero, id_rol, nombre_usuario, password_usuario, edad_usuario, correo_usuario) VALUES ($id_genero, $id_rol, '$nombre_usuario', '$password_usuario', $edad, '$correo');") or die(pg_last_error());

        if($resl){
            header('Location: https://kenary.nelsoncastro.me/sysadmin/usuarios.php');
            pg_close();
        }else{
            echo pg_last_error();
            pg_close();
        }
    }else{
        header('Location: https://kenary.nelsoncastro.me/sysadmin/usuarios.php?error=true');
    }
    
?>