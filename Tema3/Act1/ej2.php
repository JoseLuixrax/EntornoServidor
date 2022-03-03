<?php
/**
 * Carga en variables mes y año e indica el número de días del mes. Utiliza la estructura de control switch
 * 
 * @author Tomas
 */
date_default_timezone_set('Europe/Madrid');
$mes=date('m');
$anyo=date('Y');
$dias;
switch($mes){
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        $dias=31;
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        $dias=30;
        break;
    case 2:
        if(($anyo%4==0 && $anyo%100!=0) || $anyo%400==0){
            $dias=29;
        }else{
            $dias=28;
        }
        break;
}
echo 'Hay en el mes'.$mes.'un total de '.$dias.'en el año'.$anyo;
?>