<?php
require "../vendor/autoload.php";
require "../app/Models/constantes.php";
use App\Models\Superheroes;

$id = 1;
$datos = array(
    "nombre"=> "patata",
    "velocidad"=> 1
);

$sh = Superheroes::getInstancia();

//Mostrar superhéroes
foreach($sh->getAll() as $key => $value){
    //Creo una tabla para meter los heroes
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Velocidad</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$value["id"]."</td>";
    echo "<td>".$value["nombre"]."</td>";
    echo "<td>".$value["velocidad"]."</td>";
    echo "</table>";
}
?>