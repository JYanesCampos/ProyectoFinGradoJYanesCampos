<?php
SESSION_START();
include_once ('../php/config.php');

$datosAdmin = json_decode($_POST['datos']);
$admin;
//Conexion con la base de datos
$conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
$conexion -> set_charset("utf8");

if ($conexion -> connect_error)
{
    die ("Conexion fallida: " . $conexion -> connect_error);
}

$sql = "SELECT * FROM propietario WHERE email = '".$datosAdmin->email."' AND password = '".$datosAdmin->password."'";

$resultado = $conexion -> query($sql);

//Si no encuentra propietario en la BBDD con esos datos.
if (mysqli_num_rows($resultado)== 0)
{
    echo "No encuentra usuario";
    $mensaje = "Email y/o contraseña incorrectos.";
    $error = true;
}

else
{
    $mensaje = "Inicio de sesion correcto";
    $error = false;
    $admin = mysqli_fetch_assoc($resultado);

    //  CREAMOS LA SESSION CON LOS DATOS DEL ADMIN PARA PODER ACCEDER A LAS FUNCIONES DEL ADMIN 
    $_SESSION['usuario'] = $admin;
    if($datosAdmin->mantenerSesion)
        $_SESSION['mantenerSesion'] = true;
    $_SESSION['admin'] = true;

}

$objeto_salida = array (
    "mensaje" => $mensaje,
    "error" => $error,
    "formulario" => $datosAdmin->formulario,
    "datos" => $admin,
    "admin" => true,

);
$json_salida = json_encode($objeto_salida);
echo $json_salida;

$conexion -> close();

?>