<?php
/**
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual
 * correspondiente. Marcar el día actual en verde y los festivos en rojo.
 * @author Tomas
 */
date_default_timezone_set('Europe/Madrid');
$mes=date('m');
$anyo=date('Y');
$diaActual=date('d');
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
$diasSemana=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    // if($i==$diaActual-1){
    //     echo "<span style='color:green'>".($i+1)."</span>";
    // }else{
    //     echo ($i+1);
    // }
    echo "<html><head></head><body><table border='1'>";
    echo "<tr>";
    for($i=0;$i<7;$i++){
        echo "<td bgcolor='red'>$diasSemana[$i]</td>";
    }
    echo "</tr>";
    $dia=1;
    for($i=1;$i<=5 && $dia<=$dias;$i++){
        echo "<tr>";
        for($j=0;$j<7 && $dia<=$dias;$j++){
            if($i==$diaActual && $j==date('w')){
                echo "<td bgcolor='green'>$dia</td>";
            }else{
                echo "<td>$dia</td>";
            }
            $dia++;
        }
    }
    echo "</tr>";
    echo "</html>";
?>