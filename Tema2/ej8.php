<?php
/**
 * A veces es necesario conocer exactamente el contenido de una variable. Piensa como puedes hacer
 * esto y escribe un script con la siguiente salida: 
 * string(5) “Harry” 
 * Harry
 * int(28) 
 * NULL
*/
$cadena="Harry";
$numero=5;
echo "String($numero) "."$cadena".'</br>';
$numero=28;
echo $cadena[5];

?>