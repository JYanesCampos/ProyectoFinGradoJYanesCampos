<?php

include_once ('../php/config.php');

    $oUsuario = json_decode($_POST['datos']);

    /*
        //BORRAR
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
        $usuarioBDD = mysqli_fetch_assoc($resultado);
    }

    $objeto_salida = array (
        "mensaje" => $mensaje,
        "error" => $error,
        "formulario" => "frmInicioSesion",
        "area" => "containerHome",
        "usuario" => $usuarioBDD,
        "mantenerSesion" => $oUsuario->mantenerSesion,
    );
    $json_salida = json_encode($objeto_salida);
    echo $json_salida;

    $conexion -> close();

?>