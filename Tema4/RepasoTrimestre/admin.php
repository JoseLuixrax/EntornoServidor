<?php
session_start();
include 'config/conf.php';
var_dump($_SESSION['pizzas']);
if(isset($_POST['enviar']) && !empty($_POST['newPizza'] && !empty($_POST['precio']))){
    //Añado pizza a mi sesion
    $pizza=array(
        'tipo'=>$_POST['newPizza'],
        'precio'=>$_POST['precio']
    );
    array_push($_SESSION['pizzas'],$pizza);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir pedidos</title>
</head>
<body>
    <?php

    if($_SESSION['rol']=='ADMINISTRADOR'){
        echo '<h1>Añadir pedidos</h1>';
        echo '<form action="admin.php" method="post">
            <label for="pizza">Nueva pizza:</label>
            <input type="text" name="newPizza">
            <br>
            <label for="precio">Precio pizza:</label>
            <input type="number" name="precio" min=0 >
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </form>';
        echo '<br>';
        echo '<a href="logout.php">Cerrar sesión</a>';
        echo '<br>';
        echo '<a href="salir.php">Salir</a>';
    }
    else{
        echo '<h1>No tienes permisos para acceder a esta página</h1>';
    }

    ?>
</body>
</html>