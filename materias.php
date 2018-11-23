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

    $ID=$_SESSION['id'];

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
     or die("Murio");
    $result=pg_query($dbconn, "SELECT materia.nombre_materia, materia.id_materia FROM tutoria INNER JOIN materia ON tutoria.id_usuario = '$ID'");
    $dataResult="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_materia'];
        $name=$row['nombre_materia'];
        $dataResult=$dataResult."<tr><td class=\"id\">$id</td><td>$name</td>";
        if($type==1){
            $dataResult=$dataResult."<td><a href=\"delete-materia.php\" class=\"delete waves-effect waves-light btn red\">BORRAR</a></td>";
            $dataResult=$dataResult."<td><a class=\"mod waves-effect waves-light btn blue\">MODIFICAR</a></td>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/table.css">
    <title>Materias</title> 
</head>
<body>

    <?php include 'nav-bar.php' ?>

    <div class="table">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
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
    <div class="fixed-action-btn">
        <a href="form-materia.php" class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <script src="js/materias.js"></script>
</body>
</html>