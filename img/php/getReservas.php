<?php

include_once ('../php/config.php');

$conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
$conexion -> set_charset("utf8");

if ($conexion -> connect_error)
{
    die ("Conexion fallida: " . $conexion -> connect_error);
}

$sql= "SELECT * FROM `reserva`";
$resultado = $conexion -> query($sql);

$arrayReservas = array();

while($row = $resultado->fetch_assoc()){
    array_push($arrayReservas, $row);
}

/*
    echo "<pre>";
    print_r($arrayReservas);
    echo "</pre>";
*/

$json_arrayReservas = json_encode($arrayReservas);
echo $json_arrayReservas;

$conexion -> close();

?>