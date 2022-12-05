<?php
require_once('./php/funciones.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas de vacaciones</title>
    <meta name="description" content="Pagina web para la reserva de casas vacacionales.">
    <meta name="author" content="Joaquin Yanes Campos">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\css.css">
</head>
<body>

    <!-- BARRA DE NAVEGACION -->
    <div class="container mt-5" id="containerNavs">
        <div class="row" id="navBarNoLogueado">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Home</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <button class="btn">Social</button>
                      </li>
                      <li class="nav-item">
                        <button class="btn">Galería</button>
                      </li>
                      <li class="nav-item">
                        <button class="btn">Reserva</button>
                      </li>
                      <li class="nav-item">
                        <button class="displayAdmin btn">Administración</button>
                      </li>
                    </ul>
                    <form class="d-flex">
                      <button class="btn" type="submit">Iniciar Sesion</button>
                      <button class="displayNone btn" type="submit">Cerrar Sesion</button>
                    </form>
                  </div>
                </div>
              </nav>
        </div>
    </div>

    <!-- INICIAR SESION -->
    <div class="container displayNone" id="containerIniciarSesion">
        <div class="row">
            <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
                <p class="h3 text-center">Iniciar Sesion</p>
                <form>
                    <div class="form-group row p-2">
                      <label class="col-4 col-form-label" for="emailIniciarSesion">Email</label> 
                      <div class="col-8">
                        <input id="emailIniciarSesion" name="emailIniciarSesion" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row p-2">
                      <label for="passwordIniciarSesion" class="col-4 col-form-label">Contraseña</label>
                      <div class="col-8">
                        <input id="passwordIniciarSesion" name="passwordIniciarSesion" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row p-2">
                      <div class="col-8 offset-4">
                        <div class="custom-control custom-checkbox custom-control-inline">
                          <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="mantenerSesion"> 
                          <label for="checkbox_0" class="custom-control-label">Mantener Sesión</label>
                        </div>
                      </div>
                    </div> 
                    <div class="form-group row p-2">
                      <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Iniciar Sesion</button>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <form>
                    <div class="container text-center">
                      <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary btn-lg">Regístrate</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>

    <!-- REGISTRAR Usuario -->
    <div class="container displayNone" id="containerRegistrarUsuario">
      <div class="row">
        <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
          <p class="h3 text-center">Registrate</p>
          <form>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label" for="nombreRegistroUsuario">Nombre</label> 
              <div class="col-8">
                <input id="nombreRegistro" name="nombreRegistro" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label" for="apellidosRegistroUsuario">Apellidos</label> 
              <div class="col-8">
                <input id="apellidosRegistroUsuario" name="apellidosRegistroUsuario" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label" for="telefonoRegistroUsuario">Telefono</label> 
              <div class="col-8">
                <input id="telefonoRegistroUsuario" name="telefonoRegistroUsuario" type="text" class="form-control">
              </div>
            </div><div class="form-group row p-2">
              <label class="col-4 col-form-label" for="emailRegistroUsuario">Email</label> 
              <div class="col-8">
                <input id="emailRegistroUsuario" name="emailRegistroUsuario" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label" for="contraseñaRegistroUsuario1">Contraseña</label> 
              <div class="col-8">
                <input id="contraseñaRegistroUsuario1" name="contraseñaRegistroUsuario1" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label" for="contraseñaRegistroUsuario2">Repita la contraseña</label> 
              <div class="col-8">
                <input id="contraseñaRegistroUsuario2" name="contraseñaRegistroUsuario2" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Registrar usuario</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- HOME -->
    <div class="container" id="containerHome">
      
      <!--TITULO-->
      <div class="row">
        <div class="col text-center my-5">
          <p class="h2">Casa Vacacional Urbanización Moderna</p>
        </div>
      </div>

      <!--CAROUSEL-->
      <div class="row">
        <div class="col">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
<?php

// BUCLE PARA CREAR LOS ITEMS DEL CAROUSEL. 
// EL PRIMERO TIENE QUE SER CLASS="CAROUSEL-ITEM *ACTIVE*", LOS DEMAS NO LLEVAN ACTIVE



?>
              <div class="carousel-item active">
                <img src="img/urbanizacion.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Urbanización de nueva construcción.</h5>
                  <p>Casa preparada tanto para el verano como para el frío.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/salon.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Salón y cocina.</h5>
                  <p>Amplios para poder hacer tu estancia lo mas relajada posible.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/bedroom.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Habitaciones comodas.</h5>
                  <p>Listas para que desconectes en tus vacaciones.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/pool.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Piscina en el patio.</h5>
                  <p>Para los días calurosos de verano, relájate en nuestra piscina.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <!--INFORMACIÓN-->
      <div class="row">
        <div class="col text-center my-5">
          <p class="h3">Información General</p>
        </div>
      </div>

      <div class="row">
        <div class="col">
          
        </div>
      </div>


    </div>

    <!--JS Bootstrap-->
    <script src="js\bootstrap.bundle.min.js"></script>
    <!--JS Auxiliar-->
    <script src="js\cookiesandxml.js"></script>

    <script>

    </script>
</body>
</html>