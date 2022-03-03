<?php
/**
 * Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le 
 * corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color 
 * seleccionado. ¿Puedes hacerlo con los conocimientos que tienes?
 * @author Tomas
 */

//Mostrar tabla con colores y su valor en hexadecimal.Cada celda es un enlace a otra pagina web.
    
echo "<html><head></head><body><table border='1'>";

for($i=0;$i<256;$i+=32){
    for($j=0;$j<256;$j+=32){
        for($k=0;$k<256;$k+=32){
            echo "<tr>";
            echo "<td bgcolor='#".dechex($i).dechex($j).dechex($k)."'><a href='ej4.php?color="
            .dechex($i).dechex($j).dechex($k)."'>".dechex($i).dechex($j).dechex($k)."</a></td>";
            echo "</tr>";
        }
    }
}
echo "</table>";
echo "</html>";
?>