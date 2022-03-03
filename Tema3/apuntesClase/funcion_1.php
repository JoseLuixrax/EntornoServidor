<?php
//Uso de callbacks y funciones en php
$numeros=array(2,3,4,5,6);
//Uso de array_map
$numerosCuadrados=array_map(function($valor){
    return $valor*$valor;
},$numeros);
print_r($ejemplo);
?>