<?php
    session_start();
    if($_SESSION['logged']){
        header('Location: https://kenary.nelsoncastro.me/dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
        <!-- Import de normalize -->
        <link type="text/css" rel="stylesheet" href="css/normalize.css">
        <!-- CSS propio -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <!-- roboto font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- Logo -->
        <link rel="icon" href="./img/LogoKenary.png">
        <title>Kenary SED</title>
    </head>

    <body>
        <?php 
            if(isset($_GET['badcredentials'])&&$_GET['badcredentials']==true){
                echo "<div class=\"error\"><div>Bad credentials, please try again</div></div>";
            }else{
                if(isset($_GET['timeout'])&&$_GET['timeout']){
                    echo "<div class=\"error\"><div>Timeout, login again</div></div>";
                }
            }
            
        ?>
        <div class="container">

            <img src="./img/LogoKenary.png" alt="logo">

            <form name="login" class="form" action="auth.php" method="post">
                <div class="input-container">
                    <div class="row">
                        <div class="input-field col s12">   
                            <input name="username" id="username" type="text" class="validate">
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </div>
                <button id="form-button" class="btn waves-effect waves-light" type="submit" name="action">Login</button>
            </form>
        </div>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

</html>
