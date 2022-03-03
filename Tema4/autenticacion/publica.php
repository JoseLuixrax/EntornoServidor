<?php
    session_start();
    if(!isset($_SESSION['auth'])){
        $_SESSION['auth']=false;
    }

    if(isset($_POST['submit'])){
        if($_POST['user']==='usuario' and $_POST['pass']==="1234"){
            $_SESSION['auth']=true;
            $_SESSION['user']=$_POST['user'];
        }
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
                echo "<a href=\"salir.php\">Salir</a>";            
            }
        ?>
        
    </nav>
    <?php
        if($_SESSION['auth']){
            echo "Logueado";
        }else{
            include "view/form.view.html";
        }
    ?>
    <h2>Pagina de inicio</h2>
</body>
</html>