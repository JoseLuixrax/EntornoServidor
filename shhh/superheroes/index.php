<?php 
require 'crud.php';

if(isset($_GET['delete']) && $_GET['delete']){ //Borrar heroe
    $id=$_GET['id'];
    $resultado=removeHeroe(intval($id));
}

if(isset($_GET['editar']) && $_GET['editar']){ //Editar heroe
    header("Location: editar.php?id=".$_GET['id']."&editar=true");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperHeroes</title>
</head>
<body>
    <a href="add.php">Añadir heroe</a>
    <a href="buscar.php">Buscar heroes</a>
    <h2>Lista heroes</h2>
    <?php
        $listaHeroes=getAllHeroes();
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Velocidad</th><th>Acciones</th></tr>";
        foreach($listaHeroes as $heroe){
            echo "<tr>";
            echo "<td>".$heroe['id']."</td>";
            echo "<td>".$heroe['nombre']."</td>";
            echo "<td>".$heroe['velocidad']."</td>";
            echo "<td><a href='index.php?id=".$heroe['id']."&editar=true'>Editar</a> <a href='index.php?id=".$heroe['id']."&delete=true'>Borrar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>