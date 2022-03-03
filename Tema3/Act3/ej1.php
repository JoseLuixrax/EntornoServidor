<?php
/**
 * Indexación de los ejercicios mediante un array.
 * @author Tomas
 */
$ejercicios=array(
    "Tema 3"=>array(
        "rutaProyecto"=>"/Tema3/",
        "ejercicios"=>array(
            "Act1"=>array(
                "ej1"=>"Act1/ej1.php",
                "ej2"=>"Act1/ej2.php",
                "ej3"=>"Act1/ej3.php",
                "ej4"=>"Act1/ej4.php",
                "ej5"=>"Act1/ej5.php"
            ),
            "Act2"=>array(
                "ej1"=>"Act2/ej1.php",
                "ej2"=>"Act2/ej2.php",
                "ej3"=>"Act2/ej3.php",
                "ej4"=>"Act2/ej4.php",
                "ej5"=>"Act2/ej5.php"
            ),
            "Act3"=>array(
                "ej1"=>"Act3/ej1.php",
                "ej2"=>"Act3/ej2.php",
                "ej3"=>"Act3/ej3.php",
                "ej4"=>"Act3/ej4.php",
                "ej5"=>"Act3/ej5.php"
            ),
            "Act4"=>array(
                "ej1"=>"Act4/ej1.php",
                "ej2"=>"Act4/ej2.php",
                "ej3"=>"Act4/ej3.php",
                "ej4"=>"Act4/ej4.php",
                "ej5"=>"Act4/ej5.php"
            ),

        )
    )
);

foreach($ejercicios as $tema=>$ejerciciosTema){
    echo "<h1>$tema</h1>";
    echo "<ul>";
    foreach($ejerciciosTema["ejercicios"] as $actividad=>$ejerciciosActividad){
        echo "<li>$actividad</li>";
        echo "<ul>";
        foreach($ejerciciosActividad as $ejercicio){
            echo "<li><a href='".$ejerciciosTema["rutaProyecto"].$ejercicio."'>$ejercicio</a></li>";
        }
        echo "</ul>";
    }
    echo "</ul>";
}

?>