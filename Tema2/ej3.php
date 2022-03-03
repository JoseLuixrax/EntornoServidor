<?php

/**
 * Script que, a partir del radio almacenado en una variable y la definición de la constante PI, calcule el
 * área del círculo y la longitud de la circunferencia. El debe mostrar valor de radio, longitud de la
 * circunferencia, área del círculo y dibujará un círculo utilizando gráficos vectoriales.
 * @author Tomas Hidalgo
 */
$radio=20;
define("PI", 3.14);
$longitudCircunferencia=2*$radio*PI;
$areaCirculo=$radio*$radio*PI;
printf("El radio es %d y la longitud de la circunferencia es %.2f y el área del círculo es %.2f",$radio,$longitudCircunferencia,$areaCirculo);

printf('<svg height="100" width="100">
<circle cx="50" cy="50" r="%d" stroke="black" stroke-width="3" fill="red" />
</svg>',$radio);
?>