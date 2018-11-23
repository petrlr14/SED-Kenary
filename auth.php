<?php
/**
 * Created by PhpStorm.
 * User: tupic98
 * Date: 11/22/18
 * Time: 7:10 PM
 */
    session_start();
    include 'conn.php';

    //global $DB_HOST;
    //global $DB_PORT;
    //global $DB_NAME;
    //global $DB_USER;
    //global $DB_PASS;
    $secret_key = 'e4b380d39aeaf39cbf67cce33b1cd665a1fec05c';
    $db_conn =
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
        or die("Murio");

    function loginUser($data){
        global $db_conn;
        global $secret_key;
        $passwordResult = pg_query_params($db_conn, 'SELECT id_usuario, nombre_usuario, password_usuario, id_rol FROM usuario WHERE correo_usuario=$1',array($data[0]));
        $rowResult = pg_fetch_row($passwordResult);
        echo $data[1];
        echo $rowResult[2];
        
        if(password_verify($data[1], $rowResult[2])){
            if($rowResult[3]==2){
                header('Location: https://kenary.nelsoncastro.me?admin=true');
            }else{
                $certificate = array($data[0],$rowResult[2]);
            $_SESSION['logged']=true;
            $_SESSION['start']=time();
            $_SESSION['expire']=$_SESSION['start']+(10*60);
            $_SESSION['name'] = $rowResult[1];
            $_SESSION['id'] = $rowResult[0];
            $_SESSION['type'] = $rowResult[3];
            header('Location: https://kenary.nelsoncastro.me/dashboard.php');
            }
        }else{
            header('Location: https://kenary.nelsoncastro.me?badcredentials=true');
        }
    }



        if(isset($_POST['username']) && isset($_POST['password'])){
            $user = $_POST['username'];
            $password_usuario = $_POST['password'];

//          Generando una cadena de bytes pseudo-aleatoria
            $tokenbytes = openssl_random_pseudo_bytes(8);

//          Transformando cadena generada de bytes a hexadecimal
            $tokenhex = bin2hex($tokenbytes);

            try{
                $userData = array($user,$password_usuario);
                loginUser($userData);

            }catch (Exception $exception){
                echo "<p>".$exception->getMessage()."</p>";
            }

        }
?>
