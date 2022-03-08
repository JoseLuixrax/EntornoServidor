<?php
include ("./Config/config.php");
include ("./Models/Eventos.php");
include ("./Models/Usuario.php");
include ("./Models/perfiles.php");
include ("./Models/categoria.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mi perfil</title>
</head>
<body>
    <h1>Mi perfil</h1>
    <nav>
    <?php
            if(isset($_SESSION['perfil'])){
                if($_SESSION['perfil']=="productor"){
                    echo "<a href='home.php'>Home</a>";
                    echo "<a href='infoPersonal.php'>Mi perfil</a>";
                    echo "<a href='crearEventos.php'>Crear evento</a>";
                    echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
                }else{
                    echo "<a href='home.php'>Home</a>";
                    echo "<a href='infoPersonal.php'>Mi perfil</a>";
                    echo "<a href='compraEntradas.php'>Comprar entradas</a>";
                    echo "<a href=tramitarEntradas.php>Tramitar compras</a>";
                    echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
                }
            }else {
                echo "No posees acceso a la web";
            }
        ?>
    </nav>
    <main>
        <?php
            if(isset($_SESSION['usuario'])){
                //Mostrar mis datos de la sesion
                echo "<p>Bienvenido ".$_SESSION['usuario']."</p>";
                echo "<p>Tu correo es ".$_SESSION['email']."</p>";
            }
        ?>
    </main>
</body>
</html>