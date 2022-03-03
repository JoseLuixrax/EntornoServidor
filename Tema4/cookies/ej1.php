<?php
/**
 * Ejercicio 1
 * Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la
 * cookie y destruirla.
 * @author Tomas
 */
if(!isset($_COOKIE['cookie'])){
    setcookie('cookie', 'valor', time() + 100);
}
if($_GET['eliminar']){
    setcookie('cookie', 'valor', time() - 100);
    $_COOKIE['cookie']=null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <div class="contenedor">
        <?php
            if(isset($_COOKIE['cookie'])){
                echo '<p>La cookie existe '.$_COOKIE['cookie'].'</p>';
                echo '<p><a href="ej1.php?eliminar=true">Eliminar cookie</a></p>';
            }else{
                echo '<p>La cookie no existe</p>';
            }

        ?>
    </div>
</body>
</html>