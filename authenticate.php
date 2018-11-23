<?php
    session_start();
    
    include 'conn.php';

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
     or die("Murio");

    $username=$_POST['username'];
    $pass=$_POST['password'];

    $hash=strtoupper(hash('sha256', $pass));
    
    $result=pg_query($dbconn, "SELECT id_usuario, password_usuario, id_rol FROM usuario WHERE correo_usuario = '$username'");

    echo pg_last_error();

    $re=pg_fetch_row($result);

    pg_close();

    if($re[1]==$hash){
        echo $re[2];
        /* if($re[2]==2){
            header('Location: https://kenary.nelsoncastro.me?admin=true');
        }else{
            $_SESSION['logged']=true;
            $_SESSION['start']=time();
            $_SESSION['expire']=$_SESSION['start']+(10*60);
            $_SESSION['type']=$re[2];
            $_SESSION['id']=$re[0];
            header('Location: https://kenary.nelsoncastro.me/dashboard.php');
        } */
    }else{
        header('Location: https://kenary.nelsoncastro.me?badcredentials=true');
    }
?>