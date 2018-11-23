<?php
    session_start();
//    $secret_key = 'c8d0fa5cd8875b87d6eb04793ea95947';
//    $headers = getallheaders();
//    if ($_SESSION['JWTToken']) {
//        $jwt = $headers['Authorization'];
//        $token = JWT::decode($jwt, $secret_key);
//        if ($token->exp >= time()) {
//            //loggedin
//        } else {
//            session_destroy();
//            header('Location: https://kenary.nelsoncastro.me?timeout=true');
//        }
//    } else {
//        session_destroy();
//        header('Location: https://kenary.nelsoncastro.me');
//    }
//
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
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col m10">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col m10">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
    </div>

</body>
</html>