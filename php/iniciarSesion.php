<?php
SESSION_START();
include_once ('../php/config.php');

    $oUsuario = json_decode($_POST['datos']);
/*
    BORRAR
    extract($_POST);
    extract ($oUsuario);
*/

    //Conexion con la base de datos
    $conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
    $conexion -> set_charset("utf8");

    if ($conexion -> connect_error)
    {
        die ("Conexion fallida: " . $conexion -> connect_error);
    }

    $sql = "SELECT * FROM usuario WHERE email = '".$oUsuario->email."' AND password = '".$oUsuario->password."'";

    $resultado = $conexion -> query($sql);


    //Si no encuentra usuario en la BBDD con esos oUsuario.
    if (mysqli_num_rows($resultado)== 0)
    {
        $mensaje = "Email y/o contraseña incorrectos.";
        $error = true;
    }
    //Si hay usuario en la BBDD.
    else
    {
        $mensaje = "Inicio de sesion correcto";
        $error = false;
        $_SESSION['usuario'] = mysqli_fetch_assoc($resultado);

        if($oUsuario->mantenerSesion){
            $_SESSION['mantenerSesion'] = true;
        }
        else{
            $_SESSION['mantenerSesion'] = false;
        }

        //BORRAR
        /*
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        */
    }

    $objeto_salida = array (
        "mensaje" => $mensaje,
        "error" => $error,
        "formulario" => $oUsuario->formulario,
        "area" => "containerHome",
    );
    $json_salida = json_encode($objeto_salida);
    echo $json_salida;

    $conexion -> close();

?>