<?php
    include_once('../php/config.php');
    include_once('../php/funciones.php');

    $datos = json_decode($_POST['datos'], true);
    
    /*
        echo "<pre>";
        //print_r($datos);

        //print_r($datos['idUsuario']);
        print_r($datos['arrayReserva']);

        echo "</pre>";
    */

    extract($datos);

/*
    echo "<pre>";
    print_r(gettype($arrayReserva[0]));
    echo "\n";
    print_r($arrayReserva[count($arrayReserva)-1]);
    echo "</pre>";

    
    /*
        LLEGA [datos] => ["2023-03-14","2023-03-15","2023-03-16"]
        $arrayReservas ={
            [0] => 2023-03-14
            [1] => 2023-03-15
            [2] => 2023-03-16
        }
    */


    $conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
    $conexion -> set_charset("utf8");

    if ($conexion -> connect_error)
    {
        die ("Conexion fallida: " . $conexion -> connect_error);
    }


    /*
        $sql = "SELECT fecha_entrada, fecha_salida FROM `reserva`";
        $resultado = $conexion -> query($sql);
    */

    /*
        echo "<pre>";
        while($row = $resultado->fetch_assoc()){
            print_r($row);
        }
        echo "</pre>";
    */

    /*
        echo "<pre>";
        while($row = $resultado->fetch_assoc()){
            echo"Reserva:";
            echo"<br>";
            print_r($row['fecha_entrada']);
            echo"<br>";
            print_r($row['fecha_salida']);
            echo"<br>";
            echo"<br>";
        }
        echo "</pre>";
    */

    /*
        echo "<pre>";
        while($row = $resultado->fetch_assoc()){
            if($row['fecha_entrada']!=$row['fecha_salida']){
                echo "true";
            }else{
                echo "false";
            }
        }
        echo "</pre>";
    */
    
    $arrayReservasBBDD = Funciones::listaReservasBBDD();
    $todoOK = true;

    foreach ($arrayReservasBBDD as $resBBDD) {
        foreach ($arrayReserva as $res){
            if($res==$resBBDD){
                $todoOK = false;
            }
        }
    }


    //  SI TODO ESTÁ BIEN, SE AÑADE LA RESERVA
    if($todoOK){
        $sql= "INSERT INTO `reserva`( `fecha_entrada`, `fecha_salida`, `id_usuario`, `id_casa`) 
            VALUES ('".$arrayReserva[0]."',
                '".$arrayReserva[count($arrayReserva)-1]."',
                ".$idUsuario.",
                1
               )";
        
        $resultado = $conexion -> query($sql);
        $mensaje = "Se ha guardado la reserva con exito.";
        $error = false;
    }else{
        $error = true;
        $mensaje = "No pueden reservarse dichas fechas, asegurese de que los dias seleccionados están libres.";
    }

    $objeto_salida = array(
        "mensaje" => $mensaje,
        "error" => $error,
    );
    $json_salida = json_encode($objeto_salida);
    echo $json_salida;


/*
    echo "<pre>";
    print_r($arrayReservasBBDD);
    echo "Primera Comparacion:";
    if($arrayReservas[0]==$arrayReservasBBDD[0]){
        echo "True";
    }else{
        echo "false";
    }
    echo "Segunda comparacion:";
    print_r($arrayReservasBBDD[0]==$arrayReservasBBDD[0]);
    echo "</pre>";
*/

    //$conexion -> close();
?>