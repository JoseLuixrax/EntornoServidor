<?php
session_start();
include 'config/conf.php';
if(!isset($_SESSION['rol'])){
    $_SESSION['rol']='INVITADO';
}

if(isset($_POST['enviar'])){
    $_SESSION['nombre']=$_POST['nombre'];
    $_SESSION['password']=$_POST['password'];
    
    foreach($aUsuarios as $usuario){
        if($usuario['nombre']==$_SESSION['nombre'] && $usuario['password']==$_SESSION['password']){
            $_SESSION['rol']=$usuario['rol'];
            $_SESSION['telefono']=$usuario['telefono'];
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu inicio sesión</title>
</head>
<body>
    <?php
        //Menu inicio sesión y registro
        if($_SESSION['rol']=='CLIENTE'){
            if(!empty($_SESSION['nombre'])){
                echo '<h1>Bienvenido '.$_SESSION['nombre'].'</h1>';
            }
            echo '<br>';
            echo '<a href="publico.php">Pedir pizza</a>';
            echo '<br>';
            echo '<a href="logout.php">Cerrar sesión</a>';
            echo '<br>';
            echo '<a href="salir.php">Salir</a>';

        }else if($_SESSION['rol']=="ADMINISTRADOR"){
            echo '<h1>Bienvenido '.$_SESSION['nombre'].'</h1>';
            echo '<a href="admin.php">Añadir Pedidos</a>';
            echo '<br>';
            echo '<a href="logout.php">Cerrar sesión</a>';
            echo '<br>';
            echo '<a href="salir.php">Salir</a>';
        }
        else{
            echo '<form action="index.php" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" name="nombre">
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
                <br>
                <input type="submit" name="enviar" value="Iniciar sesión">
            </form>';
            echo '<br>';
            echo '<a href="publico.php">Pedir pizza</a>';
        }
    ?>
</body>
</html>