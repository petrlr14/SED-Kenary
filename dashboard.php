<?php
    session_start();
    if(!$_SESSION['logged']){
        session_destroy();
        header('Location: https://kenary.nelsoncastro.me');
    }else{
        if($_SESSION['expire']<=time()){
            session_destroy();
            header('Location: https://kenary.nelsoncastro.me?timeout=true');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
    <link rel="stylesheet" href="./css/style-dashboard.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" href="./img/LogoKenary.png">
    <title>Dashboard</title>
</head>
<body>
    
    <div class="navbar-fixed">
    <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Kenary</a>
      <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="materias.php">Materias</a></li>
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
    </div>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="materias.php">Materias</a></li>
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>