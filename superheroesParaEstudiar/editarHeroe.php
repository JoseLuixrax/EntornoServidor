<?php
include ("./Config/config.php");
include("./Models/Superheroe.php");
include("./Models/Usuario.php");
session_start();

if(isset($_POST['enviar'])){
    $updateHeroe=new Superheroe();
    $arrayDatos=[
        "id"=>$_POST['id'],
        "nombre"=>$_POST['nombre'],
        "velocidad"=>$_POST['velocidad'],
    ];
    $updateHeroe->edit($arrayDatos);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Editar heroe</title>
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

            if(isset($_GET['id'])){
                $miHeroe=new Superheroe();
                $miHeroe=$miHeroe->get($_GET['id']);
                echo "<form class='formRegistro' method='post' action='editarHeroe.php'>";
                echo "<input type='hidden' name='id' value='".$miHeroe[0]['id']."'>";
                echo "<label>Nombre</label>";
                echo "<input type='text' name='nombre' value='".$miHeroe[0]['nombre']."'>";
                echo "<label>Velocidad</label>";
                echo "<input type='number' name='velocidad' value='".$miHeroe[0]['velocidad']."'>";
                echo "<input type='submit' name='enviar' value='Editar'>";
                echo "</form>";
            }else{
                header("Location: misHeroes.php");
            }
        
        ?>
    </main>

    <footer>
        <p>&copy; 2022 - Tomás Hidalgo</p>
    </footer>
</body>
</html>