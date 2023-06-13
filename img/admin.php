<?php


//BORRAR
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas de vacaciones</title>
    <meta name="description" content="Pagina web para la reserva de casas vacacionales.">
    <meta name="author" content="Joaquin Yanes Campos">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

    <div class="container view" id="containerIniciarSesionAdmin">
        <div class="row">
            <div class="col-10 col-md-6 offset-1 offset-md-3 p-2">
                <p class="h3 text-center">Iniciar Sesion</p>
                <form class="w-50" name="frmInicioSesionAdmin" id="frmInicioSesionAdmin">
                  <div class="form-group row p-2 d-flex justify-content-center">
                    <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="emailIniciarSesionAdmin">Email</label> 
                    <div class="col-8">
                      <input id="emailIniciarSesionAdmin" name="emailIniciarSesionAdmin" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="passwordIniciarSesionAdmin">Contraseña</label>
                    <div class="col-8">
                      <input id="passwordIniciarSesionAdmin" name="passwordIniciarSesionAdmin" type="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <div class="col-8 offset-4">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="checkboxMantenerSesionAdmin" id="checkboxMantenerSesionAdmin" type="checkbox" class="custom-control-input" value="mantenerSesion"> 
                        <label for="checkboxMantenerSesionAdmin" class="custom-control-label">Mantener Sesión</label>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group row p-2">
                    <div class="offset-4 col-8">
                      <button name="submit" type="button" class="btn btn-primary" id="btnIniciarSesionAdmin">Iniciar Sesion</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--JS Bootstrap-->
    <script src="js\bootstrap.bundle.min.js"></script>
    <!--JS Ajax-->
    <script src="js/ajax.js"></script>
    <!--JS Auxiliar-->
    <script src="js\cookiesandxml.js"></script>
    <!--JS Codigo-->
    <script src="js\codigoAdmin.js"></script>
</body>
</html>