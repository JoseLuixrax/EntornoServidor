<?php

include ("./Config/config.php");
include("./Models/Superheroe.php");
include("./Models/Usuario.php");
session_start();
$userRegister=true;


if(isset($_POST['enviar'])){
    $user=new Usuario();
    if(count($user->comprobarUser($_POST['usuario'],$_POST['password']))==1){
        $_SESSION['id']=$user->comprobarUser($_POST['usuario'],$_POST['password'])[0]['id'];
        $_SESSION['usuario']=$_POST['usuario'];
        header("Location: home.php");
    }else{
        $userRegister=false;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SuperHeroes Tomás Hidalgo</title>
</head>
<body>
    <h1>Superheroes</h1>
    <nav>
        <?php

        if(isset($_SESSION['usuario'])) {
            echo "<a href='home.php'>Home</a>";
            echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
        } else {
            echo "<a href='home.php'>Home</a>";
            echo "<a href='index.php'>Iniciar sesión</a>";
        }

        ?>
    </nav>

    <main>
        <?php
        echo "<form class='formRegistro' action='index.php' method='post'>";
        echo "<label for='usuario'>Usuario</label>";
        echo "<input type='text' name='usuario' id='usuario' required>";
        echo "<label for='password'>Contraseña</label>";
        echo "<input type='password' name='password' id='password' required>";
        echo "<input type='submit' name='enviar' id='submit' value='Iniciar sesión'>";
        if(!$userRegister){
            echo "<p style='color:red'>Usuario o contraseña incorrectos</p>";
        }
        echo "</form>";
        ?>
    </main>

    <footer>
        <p>&copy; 2022 - Tomás Hidalgo</p>
    </footer>
</body>
</html>