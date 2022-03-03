<?php
/**
 * Define un array que permita almacenar y mostrar la siguiente información.
 * a. Meses del año.
 * b. Tablero para jugar al juego de los barcos.
 * c. Nota de los alumnos de 2o DAW para el módulo DWES.
 * d. Verbos irregulares en inglés.
 * e. Información sobre continentes, países, capitales y banderas.
 * @author Tomas
 */

//Apartado a
$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
for($i=0;$i<count($meses);$i++){
    echo $meses[$i];
    echo "<br>";
}
echo "<br>";

//Apartado b
$tablero=array(
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
    array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J")
);
foreach($tablero as $key => $arrayFichas){
    foreach($arrayFichas as $valor){
        echo $valor." ";
    }
    echo "<br>";
}
echo "<br>";

//Apartado c
$alumnos=array(
    "Tomas"=>10,
    "Pepe"=>6,
    "Juanjo"=>3
);
foreach($alumnos as $key => $valor){
    echo $key ."->" .$valor;
    echo "<br>";
}
echo "<br>";
//Apartado d
$verbos=array(
    "Ser"=>array("be","was/were","been"),
    "Comprar"=>array("buy","bought","bought"),
    "Empezar"=>array("Begin","Began","Begun")
);
foreach($verbos as $key => $array){
    echo $key ."->" ;
    foreach($array as $valores){
        echo $valores." ";
    }
    echo "<br>";
}
echo "<br>";

//Apartado e
$mundo=array(
    "Europa"=>array(
        "España"=>array(
            "capital"=>"Madrid",
            "bandera"=>"https://simplybook.asia/uploads/flux3dp/image_files/original/f15ff2a34349df6e0cc7d91786dd38d0.png"
        ),
        "Francia"=>array(
            "capital"=>"Paris",
            "bandera"=>"https://i.pinimg.com/originals/c6/54/d2/c654d22b378bdb9da4366f6d0d74e9bc.gif"
        ),
        "Italia"=>array(
            "capital"=>"Roma",
            "bandera"=>"https://i.pinimg.com/originals/39/77/ed/3977ed572dfff73d538b91916935d96b.gif"
        )
    ),
    "America"=>array(
        "Brasil"=>array(
            "capital"=>"Brasilia",
            "bandera"=>"https://www.banderas-mundo.es/data/flags/w580/br.png"
        )
    )
);

foreach($mundo as $paises){
    foreach($paises as $pais =>$props){
        echo $pais."-> ";
        foreach($props as $propiedad){
            if($props["capital"]){
                echo "capital ".$propiedad;
            }else{
                echo "<img src=\"$propiedad\">";
            }
        }
    }
}
?>