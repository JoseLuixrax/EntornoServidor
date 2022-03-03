<?php
    session_start();
    if(!($_SESSION['auth'])){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Ejemplo de auth basico</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="publica.php">Publico</a>
        <?php
            if($_SESSION['auth']){
                echo "<a href=\"privada.php\">Privado</a>";
            }
        ?>
        <a href="salir.php">Salir</a>
    </nav>
    <?php
        if($_SESSION['auth']){
            echo "Logueado como... ".$_SESSION['user'];
        }
    ?>
    <h2>Pagina privada</h2>
</body>
</html>