<?php
    session_start();
    if(!isset($_SESSION['auth'])){
        $_SESSION['auth']=false;
    }
    if(!isset($_SESSION['admin'])){
        $_SESSION['admin']=false;
    }

    if(isset($_POST['submit'])){
        if($_POST['user']==='tomas' and $_POST['pass']==="1234"){
            $_SESSION['admin']=true;
        }
        $_SESSION['auth']=true;
        $_SESSION['user']=$_POST['user'];
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
        <?php
            if($_SESSION['auth']){
                if($_SESSION['admin']){
                    include "admin.html";
                }else{
                    include "usuario.html";
                }
            }else{
                include "form.html";
            }
        ?>
        <a href="salir.php">Salir</a>
    </nav>
</body>
</html>