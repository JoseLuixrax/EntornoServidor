<?php

/**
 * Carga fecha de nacimiento en variables y calcula la edad.
 * @author Tomas
 */

date_default_timezone_set("Europe/Madrid");
$diaCumple=25;
$mesCumple=9;
$anioCumple=2001;   

$diaActual=getdate()['mday'];
$mesActual=getdate()['mon'];
$anioActual=getdate()['year'];

$edad= $anioActual-$anioCumple;
    
if($mesActual<$mesCumple){
    $edad--;
}elseif($mesActual==$mesCumple && $diaActual<$diaCumple){
    $edad--;
}
echo "La edad es: $edad";
?>