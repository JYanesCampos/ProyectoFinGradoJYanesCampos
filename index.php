<?php
include_once ('./php/config.php');
include_once('./php/funciones.php');

$conexion = mysqli_connect(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
mysqli_set_charset($conexion, "utf8");

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


    <!-- BARRA DE NAVEGACION -->
    <div class="container mt-5" id="containerNavs">
        <div class="row" id="navBarNoLogueado">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                  <button class="navbar-brand btn" id="navHome">Home</button>
                  <button class="navbar-toggler" 
                          type="button" data-bs-toggle="collapse" 
                          data-bs-target="#navbarSupportedContent" 
                          aria-controls="navbarSupportedContent" 
                          aria-expanded="false" 
                          aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <button class="btn" id="navSocial">Social</button>
                      </li>
                      <li class="nav-item">
                        <button class="btn" id="navGaleria">Galería</button>
                      </li>
                      <li class="nav-item">
                        <button class="btn" id="navReserva">Reserva</button>
                      </li>
                      <li class="nav-item">
                        <button class="displayAdmin btn" id="navAdmin">Administración</button>
                      </li>
                    </ul>
                    <form class="d-flex">
                      <button class="btn" type="button" id="navIniciarSesion">Iniciar Sesion</button>
                      <button class="displayNone btn" id="navCerrarSesion">Cerrar Sesion</button>
                    </form>
                  </div>
                </div>
              </nav>
        </div>
    </div>

    <!-- INICIAR SESION -->
    <div class="container displayNone view" id="containerIniciarSesion">
        <div class="row">
            <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
                <p class="h3 text-center">Iniciar Sesion</p>
                <form class="w-50" name="frmInicioSesion" id="frmInicioSesion">
                  <div class="form-group row p-2">
                    <label class="col-4 col-form-label" for="emailIniciarSesion">Email</label> 
                    <div class="col-8">
                      <input id="emailIniciarSesion" name="emailIniciarSesion" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label for="passwordIniciarSesion" class="col-4 col-form-label">Contraseña</label>
                    <div class="col-8">
                      <input id="passwordIniciarSesion" name="passwordIniciarSesion" type="password" class="form-control">
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
                      <button name="submit" type="button" class="btn btn-primary" id="btnIniciarSesion">Iniciar Sesion</button>
                    </div>
                  </div>
                </form>
                <hr>
                <form>
                  <div class="container text-center">
                    <div class="col-12 text-center">
                      <button type="button" class="btn btn-primary btn-lg" id="btnRegistrarUsuario">Regístrate</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <!-- REGISTRAR USUARIO -->
    <div class="container displayNone view" id="containerRegistrarUsuario">
      <div class="row">
        <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
          <p class="h3 text-center">Registrate</p>
          <form name="frmRegistroUsuario" id="frmRegistroUsuario">
            <div class="form-group row p-2">
              <label class="col-4 col-form-label" for="nombreRegistroUsuario">Nombre</label> 
              <div class="col-8">
                <input id="nombreRegistroUsuario" name="nombreRegistroUsuario" type="text" class="form-control">
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
                <button name="submit" type="button" class="btn btn-primary">Registrar usuario</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- HOME -->
    <div class="container view" id="containerHome">
      
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
            // EL PRIMERO DEBERÍA SER EL DE "URBANIZACION" PARA QUEDAR MAS BONITO.

            $sql="SELECT * FROM imagen WHERE id_casa=1 AND texto_carousel IS NOT NULL";
            $imagenesCarouselBDD = mysqli_query($conexion, $sql);

            $primero = true;
            foreach($imagenesCarouselBDD as $fila) // PINTA EL CAROUSEL CON LAS IMAGENES SACADAS DE LA BDD Y SU INFORMACIÓN
            {
              if($primero){
                $primero = false;
            ?>
                <div class="carousel-item active">
                  <img src="img/<?=$fila['nombre']?>.jpg" class="d-block w-100" alt="<?=$fila['texto_alt']?>">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?=$fila['titulo']?></h5>
                    <p><?=$fila['texto_carousel']?></p>
                  </div>
                </div>
            <?php
              }else{
            ?>
                <div class="carousel-item">
                  <img src="img/<?=$fila['nombre']?>.jpg" class="d-block w-100" alt="<?=$fila['texto_alt']?>">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?=$fila['titulo']?></h5>
                    <p><?=$fila['texto_carousel']?></p>
                  </div>
                </div>
            <?php
              }
            }
            ?>
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

      <?php

      $sql="SELECT * FROM casa";
      $casaBDD = mysqli_query($conexion, $sql);

      $sql="SELECT equipamiento.nombre
        FROM equipamiento
        INNER JOIN equipamiento_casa
        ON equipamiento_casa.id_equipamiento=equipamiento.id_equipamiento
        WHERE equipamiento_casa.id_casa=1";
      $equipamientoCasa = mysqli_query($conexion, $sql);

      $sql="SELECT servicio.nombre
      FROM servicio
      INNER JOIN servicio_casa
      ON servicio_casa.id_servicio=servicio.id_servicio
      WHERE servicio_casa.id_casa=1";
      $servicioCasa = mysqli_query($conexion, $sql);

      ?>

      <!--INFORMACIÓN-->
      <div class="row">
        <div class="col text-center my-5">
          <p class="h3">Información General</p>

          <div class="row">
            <div class="col text-end">
              <p>Numero de habitaciones:</p>
              <p>Numero de camas:</p>
            </div>

            <div class="col text-start">
          <?php
          foreach($casaBDD as $fila){

            echo "<p>".$fila['num_habitaciones']."</p>";
            echo "<p>".$fila['num_camas']."</p>";

          }
          ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6 text-end p-2 px-md-5">
                    <p class="h4">Equipamiento</p>
          <?php
          foreach($equipamientoCasa as $equipamiento){
            echo "<p>".$equipamiento['nombre']."</p>";
          }
          ?>
                  </div>

                  <div class="col-6  p-2 px-md-5">
                    <p class="h4">Servicios</p>
          <?php
          foreach($servicioCasa as $servicio){
            echo "<p>".$servicio['nombre']."</p>";
          }
          ?>
        </div>
      </div>

      <!-- MAPA -->
      <div class="row mx-2">
        <div class="col text-center">
          <p class="h4">Dirección</p>
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4487.179328896051!2d-5.933701594455291!3d37.32084268181402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126fd7c70ee133%3A0x9ecb6311fc2e8400!2sC.%20Azafr%C3%A1n%2C%20117%2C%2041089%20Montequinto%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1670347420031!5m2!1ses!2ses"
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

    </div>

    <!-- GALERIA (con vista masonry) -->
    <div class="container displayNone view" id="containerGaleria">
      <div class="row">
          <div class="col text-center">
            <p class="h3">Galería de Imágenes</p>
          </div>
      </div>
      <!--
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" 
        data-masonry='{"percentPosition": true }'>      
            
        <div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div>
      </div>
      -->

      <?php
      $sql="SELECT * FROM imagen WHERE id_casa=1";
      $imagenesBDD = mysqli_query($conexion, $sql);
      $posText = true;
      ?>

      <div class="row">

        <?php
        foreach($imagenesBDD as $imagenBDD)
        {
        ?>

        <div class="col col-sm-6 col-md-4 my-2">
          <div class="card">
            <img src="img/<?=$imagenBDD['nombre']?>.jpg" alt="<?=$imagenBDD['texto_alt']?>">
            <div class="card-body text-center">
              <p class="h4"><?=$imagenBDD['titulo']?></p>
              <p><?=$imagenBDD['texto']?></p>
            </div>
          </div>
        </div>

        <?php
        }
        ?>

      </div>
    </div>

    <!-- FOOTER -->
    <div class="container mb-5" id="footer">
      <div class="row">
        <div class="col text-center">
          Footer
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
    <script src="js\codigo.js"></script>
    <!--MASONRY-->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

</body>
</html>