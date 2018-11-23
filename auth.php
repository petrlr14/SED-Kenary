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
    $secret_key = 'c8d0fa5cd8875b87d6eb04793ea95947';
    $db_conn =
        pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
        or die("Murio");

    function loginUser($data){
        global $db_conn;
        global $secret_key;
        $passwordResult = pg_query_params($db_conn, 'SELECT id_usuario, nombre_usuario, password_usuario, id_rol FROM usuario WHERE correo_usuario=$1',array($data[0]));
        $rowResult = pg_fetch_row($passwordResult);
        if(password_verify($data[1], $rowResult[2])){
            $certificate = array($data[0],$rowResult[2]);
            $_SESSION['logged']=true;
            $_SESSION['start']=time();
            $_SESSION['expire']=$_SESSION['start']+(10*60);
            $_SESSION['name'] = $rowResult[1];
            $_SESSION['id'] = $rowResult[0];
            $_SESSION['type'] = $rowResult[3];

            //Creando token como JSON para el header
            $TOKENHEADER = array(
                "data" => [
                    "name" => $_SESSION['name'],
                    "type" => $_SESSION['type'],
                ],
                "iss" => $_SESSION['username'],
                "iar" => "".time()."",
                "exp" => "".time()+(60*60)."",
            );
            $token = JWT::encode($TOKENHEADER, $secret_key);
            $_SESSION['JWTToken'] = $token;
            header('Location: https://kenary.nelsoncastro.me/dashboard.php');
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