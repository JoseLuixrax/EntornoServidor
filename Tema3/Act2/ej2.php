<?php
/**
 * Sumar los 3 primeros numeros pares
 * 
 * @author Tomas
 */
$numero=2;
$contador=0;
    for($i=0;$i<6;$i++){
        if($numero%2==0){
            $contador+=$numero;
        }
        $numero++;
    }
echo $contador;

?>