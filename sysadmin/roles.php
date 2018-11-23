<?php
    include 'conn.php';

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
     or die("Murio");
    $result=pg_query($dbconn, "SELECT*FROM rol");
    $dataResult="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_rol'];
        $name=$row['nombre_rol'];
        $dataResult=$dataResult."<tr><td class=\"id\">$id</td><td>$name</td>";
        $dataResult=$dataResult."<td><a href=\"delete-rol.php\" class=\"delete waves-effect waves-light btn red\">BORRAR</a></td>";
        $dataResult=$dataResult."<td><a class=\"mod waves-effect waves-light btn blue\">MODIFICAR</a></td>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/table.css">
    <title>Roles</title>
</head>
<body>
    <?php include 'nav-bar.php' ?>

    <div class="table">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody><?php echo $dataResult?></tbody>
        </table>   
    </div>
    <div class="fixed-action-btn">
        <a href="form-rol.php"class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <script src="js/roles.js"></script>
</body>
</html>