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
    <link rel="stylesheet" href="./css/style-dashboard.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" href="./img/LogoKenary.png">
    <title>Dashboard</title>
</head>
<body>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
            <a href="dashboard.php" class="brand-logo">Kenary</a>
            </div>
        </nav>
    </div>

    <div class="cont">

        <div class="row">
    <div class="col m10">
      <div class="card teal lighten-1">
        <div class="card-content white-text">
          <span class="card-title">Usuarios</span>
          <p>Administra los usuarios que tienen acceso al servicio de Kanery</p>
        </div>
        <div class="card-action">
          <a href="usuarios.php">Ir a usuarios</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col m10">
      <div class="card teal lighten-1">
        <div class="card-content white-text">
          <span class="card-title">Materias</span>
          <p>Administra las materias de las que se ofrecen tutorias en Kanery</p>
        </div>
        <div class="card-action">
          <a href="materias.php">Ir a materias</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col m10">
      <div class="card teal lighten-1">
        <div class="card-content white-text">
          <span class="card-title">Ir a roles</span>
          <p>Ten control de los roles que puedes asignar a nuevos usuarios en Kanery</p>
        </div>
        <div class="card-action">
          <a href="roles.php">Ir a roles</a>
        </div>
      </div>
    </div>
  </div>
    </div>

</body>
</html>