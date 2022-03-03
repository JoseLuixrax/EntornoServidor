<?php  
    /**
     *  
     *  Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos. El resultado
     * debe mostrar nombre y fotografía.
     * @author Tomas
     */

    
    $alumnos=array(
        array("nombre"=>"Jesús Díaz Rivas","foto"=>"src/JesusDiazRivas.jpg"),
        array("nombre"=>"Manuel Brito Guerrero","foto"=>"src/ManuelBrito.jpg"),
        array("nombre"=>"Joaquín Baena Salas","foto"=>"src/JoaquinBaenaSalas.jpg"),
        array("nombre"=>"Laura Hidalgo Rivera","foto"=>"src/LauraHidalgoRivera.jpg"),
        array("nombre"=>"Tomas Hidalgo Martin","foto"=>"src/TomasHidalgoMartin.jpg"),
        array("nombre"=>"Carlos Hidalgo Risco","foto"=>"src/CarlosHidalgoRisco.PNG"),
        array("nombre"=>"Daniel Ayala Cantador","foto"=>"src/DanielAyalaCantador.png"),
        array("nombre"=>"Javier Cebrian Muñoz","foto"=>"src/javierCebrianMuñoz.jpeg"),
        array("nombre"=>"Javier Fernández Rubio","foto"=>"src/javierfernandezrubio.jpeg"),
        array("nombre"=>"Ruben Ramirez Rivera","foto"=>"src/RubenRamirezRivera.jpeg"),
        array("nombre"=>"David Perez Ruiz","foto"=>"src/DavidPerezRuiz.png"),
        array("nombre"=>"Alejandro Rabadan Rivas","foto"=>"src/AlejandroRabadanRivas.jpg"),
        array("nombre"=>"David Rosas Alcatraz","foto"=>"src/DavidRosasAlcaraz.jpg"),
        array("nombre"=>"Guillermo Tamajon Hernandez","foto"=>"src/GuillermoTamajonHernandez.jpg"),
        array("nombre"=>"Sergio Vera Jurado","foto"=>"src/sergiovera.png"),
        array("nombre"=>"Javier Salazar Almagro","foto"=>"src/JavierSalazarAlmagro.jpg"),
        array("nombre"=>"Manuel Solar Buenos","foto"=>"src/ManuelSolarBueno.jpg"),
        array("nombre"=>"Andrea Solís Tejada","foto"=>"src/AndreaSolisTejada.jpeg"),
        array("nombre"=>"Juan Manuel Gonzalez Profumo","foto"=>"src/JuanManuelGonzalezProfumo.jpg"),
        array("nombre"=>"Rafael Yuste Barrera","foto"=>"src/RafaelYuste.png"),
        array("nombre"=>"Javier Epifanio Lopez","foto"=>"src/JavierEpifanioLópez.jpeg"),
        array("nombre"=>"Carlos Chaves Hernandez","foto"=>"src/CarlosChaves.jpg"),
        array("nombre"=>"Virginia Ordoño Bernier","foto"=>"src/VirginiaOrdoño.jpg")
    );
    $numero = rand(0, count($alumnos)-1);
    echo $alumnos[$numero]["nombre"]."</br>";
    echo '<img src='.$alumnos[$numero]["foto"].'>';
?>
   