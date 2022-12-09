<?php
SESSION_START();

$objeto_salida = array();
$json_salida;

if(isset($_SESSION['admin']))
{
    $objeto_salida = array(
        "usuario" => $_SESSION['usuario'],
        "admin" => true,
    );
    $json_salida = json_encode($objeto_salida);

}
else
{
    if(empty($_SESSION['mantenerSesion'])){
        SESSION_DESTROY();
        SESSION_START();
    }
    else
    {

        $objeto_salida = array(
            "usuario" => $_SESSION['usuario'],
        );

        $json_salida = json_encode($objeto_salida);

    }
}
echo $json_salida;

?>