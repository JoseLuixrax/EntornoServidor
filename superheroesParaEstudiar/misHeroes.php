<?php
include ("./Config/config.php");
include("./Models/Superheroe.php");
include("./Models/Usuario.php");
include("./Models/shUser.php");
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mis superheroes</title>
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
        
        if(isset($_SESSION['usuario'])){
            $misHeroes=new shUser();
            $misHeroes=$misHeroes->getAllHeroes($_SESSION['id']);
            if(count($misHeroes)==0){
                echo "<p>No tienes superheroes</p>";
            }else{
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Velocidad</th>";
                echo "<th>Editar heroes</th>";
                echo "<th>Borrar heroes</th>";
                echo "</tr>";
                
                $heroes=new Superheroe();
                foreach($misHeroes as $heroe){
                    $miHeroe=$heroes->get($heroe['idHeroe']);
                    echo "<tr>";
                    echo "<td>".$miHeroe[0]['id']."</td>";
                    echo "<td>".$miHeroe[0]['nombre']."</td>";
                    echo "<td>".$miHeroe[0]['velocidad']."</td>";
                    echo "<td><a href='editarHeroe.php?id=".$miHeroe[0]['id']."'>Editar</a></td>";
                    echo "<td><a href='borrarHeroe.php?id=".$miHeroe[0]['id']."'>Borrar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "<p>No tienes permisos para ver esta página</p>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2022 - Tomás Hidalgo</p>
    </footer>
</body>
</html>