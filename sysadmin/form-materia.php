<?php

    include 'conn.php';

    $dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
    or die("Murio");
    $result=pg_query($dbconn, "SELECT*FROM usuario");
    $dataResult1="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_usuario'];
        $name=$row['nombre_usuario'];
        $dataResult1=$dataResult1."<option value=$id>$name</option>";
    }
    $result=pg_query($dbconn, "SELECT*FROM materia");
    $dataResult2="";
    while($row=pg_fetch_array($result)){
        $id=$row['id_materia'];
        $name=$row['nombre_materia'];
        $dataResult2=$dataResult2."<option value=$id>$name</option>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/form-rol.css">
    <title>Create Tutoría</title>
</head>
<body>
    <?php include 'nav-bar.php' ?>

    <div class="conte">
        <div class="card-panel">
            <h4 class="header2">Registra una nueva tutoría</h4>
            <div class="row">
                <form class="col s12" action="create-materia.php" method="post">
                    <div class="row">
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="id_usuario">
                                <?php echo $dataResult1?>
                            </select>
                            <label>Usuario</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="id_materia">
                            <?php echo $dataResult2?>
                            </select>
                            <label>Materia</label>
                        </div>
                        
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s7">
                              <button class="btn teal lighten-1 waves-effect waves-light right" type="submit" name="action">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/form-materia.js"></script>
</body>
</html>