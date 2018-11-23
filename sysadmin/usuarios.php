<?php

    include 'conn.php';

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
     or die("Murio");

    $result=pg_query($dbconn, "SELECT usuario.id_usuario, usuario.nombre_usuario, rol.nombre_rol FROM usuario INNER JOIN rol ON rol.id_rol <> 2");
    
    $dataResult="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_usuario'];
        $name=$row['nombre_usuario'];
        $rol=$row['nombre_rol'];
        $dataResult=$dataResult."<tr><td class=\"id\">$id</td><td>$name</td><td>$rol</td>";
        $dataResult=$dataResult."<td><a href=\"delete-usuario.php\"class=\"delete waves-effect waves-light btn red\" href=\"delete-usuario.php\">BORRAR</a></td>";
        $dataResult=$dataResult."<td><a class=\"mod waves-effect waves-light btn blue\">MODIFICAR</a></td>";
        $dataResult=$dataResult."</tr>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody><?php echo $dataResult?></tbody>
        </table>   
    </div>

    <div class="fixed-action-btn">
        <a href="form-user.php" class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
    </div>
      
    <script src="js/usuarios.js"></script>
<body>
    
</body>
</html>