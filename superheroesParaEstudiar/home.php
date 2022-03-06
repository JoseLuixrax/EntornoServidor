<?php
include ("./Config/config.php");
include("./Models/Superheroe.php");
include("./Models/Usuario.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body>
    <h1>Superheroes</h1>
    <nav>
        <?php

        if(isset($_SESSION['usuario'])) {
            echo "<a href='home.php'>Home</a>";
            echo "<a href='misHeroes.php'>Mis superheroes</a>";
            echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
        } else {
            echo "<a href='home.php'>Home</a>";
            echo "<a href='index.php'>Iniciar sesión</a>";
        }

        ?>
    </nav>

    <main>
        <?php
        
        $superheroes = new Superheroe();
        $sh=$superheroes->getAll();
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Velocidad</th>";
        echo "<th>Imagen</th>";
        echo "</tr>";
        foreach ($sh as $superheroe) {
            echo "<tr>";
            echo "<td>".$superheroe['id']."</td>";
            echo "<td>".$superheroe['nombre']."</td>";
            echo "<td>".$superheroe['velocidad']."</td>";
            echo "<td><img src='img/".$superheroe['foto']."' width='50' height='50'></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </main>

    <footer>
        <p>&copy; 2022 - Tomás Hidalgo</p>
    </footer>
</body>
</html>