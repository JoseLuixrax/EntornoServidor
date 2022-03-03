<?php
/**
 * Tabla multiplicar con estilos del 1 al 10
 * 
 * @author Tomas
 */
echo "<html><head></head><body><table border='1'>";
echo "<tr>";
for($i=1;$i<=10;$i++){
    echo "<td bgcolor='red'>Tabla del $i</td>";
}
echo "</tr>";
for($i=1;$i<=10;$i++){
    echo "<tr>";
    for($j=1;$j<=10;$j++){
        echo "<td bgcolor='green'>".$i*$j."</td>";
    }
    echo "</tr>";
    echo "</html>";
}
?>