<?php
include_once ('config.php');


function build_calendar($month,$year) {

    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('D','L','T','X','J','V','S');

    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    // How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];

    // Create the table tag opener and day headers

    $calendar = "<table class='calendar'>";
    $calendar .= "<caption>$monthName $year</caption>";
    $calendar .= "<tr>";

    // Create the calendar headers

    foreach($daysOfWeek as $day) {
         $calendar .= "<th class='header'>$day</th>";
    } 

    // Create the rest of the calendar

    // Initiate the day counter, starting with the 1st.

    $currentDay = 1;

    $calendar .= "</tr><tr>";

    // The variable $dayOfWeek is used to
    // ensure that the calendar
    // display consists of exactly 7 columns.

    if ($dayOfWeek > 0) { 
         $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
 
    while ($currentDay <= $numberDays) {

         // Seventh column (Saturday) reached. Start a new row.

         if ($dayOfWeek == 7) {

              $dayOfWeek = 0;
              $calendar .= "</tr><tr>";

         }
         
         $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
         
         $date = "$year-$month-$currentDayRel";

         $calendar .= "<td class='day' rel='$date'>$currentDay</td>";

         // Increment counters

         $currentDay++;
         $dayOfWeek++;

    }
    
    

    // Complete the row of the last week in month, if necessary

    if ($dayOfWeek != 7) { 
    
         $remainingDays = 7 - $dayOfWeek;
         $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>"; 

    }
    
    $calendar .= "</tr>";

    $calendar .= "</table>";

    return $calendar;

}

class Funciones{
    
    function listaReservasBBDD(){
        $conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
        $conexion -> set_charset("utf8");
        $sql = "SELECT fecha_entrada, fecha_salida FROM `reserva`";
        $resultado = $conexion -> query($sql);
    
        $arrayReservasBBDD = array();
    
        while($row = $resultado->fetch_assoc()){
    
            $fechaEntrada = $row['fecha_entrada'];
            $fechaSalida = $row['fecha_salida'];
    
            $reservaBBDD = array();
            $reservaBBDD = explode("-",$fechaEntrada);
            
            $diaEntrada = $reservaBBDD[2];
            $mesEntrada = $reservaBBDD[1];
            $annoEntrada = $reservaBBDD[0];
    
            while ($fechaEntrada != $fechaSalida){
                array_push($arrayReservasBBDD, $fechaEntrada);
                $aux = 0;
    
                //PARA IR AUMENTANDO LAS VARIABLES DEL DIA, MES Y ANNO E IR COMPARANDOLOS CON LA FECHA FINAL
                if(!(intval($mesEntrada)%2)){  //SI EL MES ES MULTIPLO DE 2
                    if ($mesEntrada == "02"){   //SI ES MES ES FEBRERO
                        if ($diaEntrada == "28"){   //SI EL DIA LLEGA A 28 HAY QUE SUMAR UNO AL MES
                            $diaEntrada = "01";
                            $aux = intval($mesEntrada);
                            $aux++;
                            if($aux<10){     //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                                $mesEntrada = "0".strval($aux);
                            }else{
                                $mesEntrada = strval($aux);
                            }
                        }else{
                            $aux = intval($diaEntrada);
                            $aux++;
                            if($aux<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                                $diaEntrada = "0".strval($aux);
                            }else{
                                $diaEntrada = strval($aux);
                            }
                        }
                    }else{
                        if($diaEntrada=="30"){
                            $diaEntrada="01";
                            $aux = intval($mesEntrada);
                            $aux++;
                            if($aux<10){     //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                                $mesEntrada = "0".strval($aux);
                            }else{
                                $mesEntrada = strval($aux);
                            }
                        }else{
                            $aux = intval($diaEntrada);
                            $aux++;
                            if($aux<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                                $diaEntrada = "0".strval($aux);
                            }else{
                                $diaEntrada = strval($aux);
                            }
                        }
                    }
                }else{  //SI EL MES NO ES MULTIPLO DE 2
                    if($diaEntrada=="31"){
                        $diaEntrada="01";
                        $aux = intval($mesEntrada);
                        $aux++;
                        if($aux<10){         //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            $mesEntrada = "0".strval($aux);
                        }else{
                            $mesEntrada = strval($aux);
                        }
                    }else{
                        $aux = intval($diaEntrada);
                        $aux++;
                        if($aux<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            $diaEntrada = "0".strval($aux);
                        }else{
                            $diaEntrada = strval($aux);
                        }
                    } 
                }
    
                $fechaEntrada = $annoEntrada."-".$mesEntrada."-".$diaEntrada;
                
            }
    
        }
    
        return $arrayReservasBBDD;
    }
    
}

?>