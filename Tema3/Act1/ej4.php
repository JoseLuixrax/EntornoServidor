<?php
/**
 * Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del 
 * año en la que nos encontremos y un color de fondo en función de la hora del día.
 * @author Tomas
 */
date_default_timezone_set("Europe/Madrid");
$mesActual=getdate()['mon'];
$diaActual=getdate()['mday'];
    
    if($mesActual==12 || $mesActual==1 || $mesActual==2){
        $estacion="Invierno";
        $color="blue";
    }elseif($mesActual==3 || $mesActual==4 || $mesActual==5){
        $estacion="Primavera";
        $color="green";
    }elseif($mesActual==6 || $mesActual==7 || $mesActual==8){
        $estacion="Verano";
        $color="yellow";
    }elseif($mesActual==9 || $mesActual==10 || $mesActual==11){
        $estacion="Otoño";
        $color="red";
    }

    


?>