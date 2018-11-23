<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/form-rol.css">
    <title>Create form</title>
</head>
<body>
    <?php include 'nav-bar.php' ?>

    <div class="conte">
        <div class="card-panel">
            <h4 class="header2">Registra a un nuevo rol de usuario en el sistema</h4>
            <div class="row">
                <form class="col s12" action="create-rol.php" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre_rol" type="text" name="nombre_rol">
                            <label for="nombre_rol">Nombre del rol</label>
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

</body>
</html>