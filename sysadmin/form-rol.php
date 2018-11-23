<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create form</title>
</head>
<body>
    <?php include 'nav-bar.php' ?>

    <div class="conte">
        <div class="card-panel">
            <h4 class="header2">Registra a un nuevo rol de usuario en el sistema</h4>
            <div class="row">
                <form class="col s12" action="create-user.php" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="nombre_usuario" type="text" name="nombre_usuario">
                            <label for="nombre_usuario">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="correo_usuario" type="email" name="correo_usuario">
                            <label for="correo_usuario">Correo</label>
                          </div>
                    </div>
                    <div class="row">
                          <div class="input-field col s6">
                            <input id="password_usuario" type="password" name="password_usuario" >
                            <label for="password_usuario">Password</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="edad_usuario" type="number" name="edad_usuario">
                            <label for="edad_usuario">Edad</label>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="id_rol">
                                <option value="1">Tutor</option>
                                <option value="2">Administrador</option>
                                <option value="3">Estudiante</option>
                                <option value="4">Estudiante Tutor</option>
                            </select>
                            <label>Rol</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="id_genero">
                                <option value="1">Hombre</option>
                                <option value="2">Mujer</option>
                            </select>
                            <label>Genero</label>
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