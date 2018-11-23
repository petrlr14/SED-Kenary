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

    $result=pg_query($dbconn, "SELECT usuario.id_usuario, usuario.nombre_usuario, rol.nombre_rol FROM usuario INNER JOIN rol ON rol.id_rol <> 2");
    /* $re=pg_fetch_all($result);
    print_r($re); */
    $dataResult="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_usuario'];
        $name=$row['nombre_usuario'];
        $rol=$row['nombre_rol'];
        $dataResult=$dataResult."<tr><td class=\"id\">$id</td><td>$name</td><td>$rol</td>";
        if($type==1){
            $dataResult=$dataResult."<td><a href=\"delete-usuario.php\"class=\"delete waves-effect waves-light btn red\" href=\"delete-usuario.php\">BORRAR</a></td>";
            $dataResult=$dataResult."<td><a class=\"mod waves-effect waves-light btn blue\">MODIFICAR</a></td>";
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
    <title>Usuarios</title>
</head>

    <?php include 'nav-bar.php' ?>

    <div class="table">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <?php
                        if($type==1){
                            echo "<th>Borrar</th><th>Modificar</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody><?php echo $dataResult?></tbody>
        </table>   
    </div>

    <?php
        if($_SESSION['type']==1){
            echo "<div class=\"fixed-action-btn\"><a class=\"btn-floating btn-large red\">
            <i class=\"large material-icons\">add</i></a></div>";
        }
    ?>
      
    <script src="js/usuarios.js"></script>
<body>
    
</body>
</html>