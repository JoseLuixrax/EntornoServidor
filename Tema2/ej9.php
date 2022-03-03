<?php
/**
 * Escribir un script que utilizando variables permita obtener el siguiente resultado:
 * Valor es string.
 * Valor es double.
 * Valor es boolean. 
 * Valor es integer.
 * Valor is NULL.
 */
$entero=5;
$cadena="Hello";
$booleano=true;
$doble=2.5;
$nulo=null;

echo "Valor es ".gettype($cadena).'</br>';
echo "Valor es ".gettype($doble).'</br>';
echo "Valor es ".gettype($booleano).'</br>';
echo "Valor es ".gettype($entero).'</br>';
echo "Valor es ".gettype($nulo).'</br>';

?>