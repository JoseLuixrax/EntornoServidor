<?php
/**
 * Programa que lea un número entero N de 5 cifras y muestre sus cifras igual que en el ejemplo.
 * @author Tomas
 */

$numero = rand(10000, 99999);
echo $numero;
echo "</br>";
for ($i=-1; $i > (-strlen($numero)) ; $i--) { 
    echo (substr($numero, $i))."</br>"; 
}
echo $numero;

?>