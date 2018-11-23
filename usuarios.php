<?php 

    session_start();
    if(!$_SESSION['logged']){
        session_destroy();
        header('Location: https://kenary.nelsoncastro.me');
    }
    if($_SESSION['expire']<=time()){
        session_destroy();
        header('Location: https://kenary.nelsoncastro.me?timeout=true');
    }

    $type=$_SESSION['type'];

    include 'conn.php';

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
     or die("Murio");

    $result=pg_query($dbconn, "SELECT*FROM usuario WHERE id_rol<>2");
    /* $re=pg_fetch_all($result);
    print_r($re); */
    $dataResult="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_rol'];
        $name=$row['nombre_usuario'];
        $dataResult=$dataResult."<tr><td>$id</td><td>$name</td>";
        if($type==2){
            $dataResult=$dataResult."<td><a class=\"waves-effect waves-light btn red\">BORRAR</a></td>";
            $dataResult=$dataResult."<td><a class=\"waves-effect waves-light btn blue\">MODIFICAR</a></td>";
        }
        $dataResult=$dataResult."</tr>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/table.css">
    <script src="js/usuarios.js"></script>
    <title>Usuarios</title>
</head>

    <?php include 'dashboard.php' ?>

    <div class="table">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <?php
                        if($type==2){
                            echo "<th>Borrar</th><th>Modificar</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody><?php echo $dataResult?></tbody>
        </table>   
    </div>

<body>
    
</body>
</html>