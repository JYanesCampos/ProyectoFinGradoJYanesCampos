<?php
include_once ('./php/config.php');

    $oUsuario = json_decode($_POST['datos']);
/*
    extract($_POST);
    extract ($datos);
*/

    //Conexion con la base de datos
    $conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
    $conexion -> set_charset("utf8");

    if ($conexion -> connect_error)
    {
        die ("Conexion fallida: " . $conexion -> connect_error);
    }

    $sql = "SELECT * FROM usuario WHERE email = $oUsuario->email AND password = $oUsuario->password";

    $resultado = $conexion -> query($sql);

    //Si no encuentra usuario en la BBDD con esos datos.
    if ($resultado -> num_rows == 0)
    {
        $mensaje = "Usuario y/o contraseña incorrectos.";
        $error = true;
    }
    //Si hay usuario en la BBDD.
    else
    {
        $mensaje = "Inicio de sesion correcto";
        $error = false;
        $usuario_salida = mysql_fetch_assoc($resultado);
    }

    $objeto_salida = array (
        "mensaje" => $mensaje,
        "error" => $error,
        "formulario" => "frmInicioSesion",
        "area" => "containerIniciarSesion",
        "inicioSesion" => $usuario_salida
    );
    $json_salida = json_encode($objeto_salida);
    echo $json_salida;

    $conexion -> close();

?>