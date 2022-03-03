<?php

session_start();
$numContactos=0;

if(isset($_POST['reiniciar'])){
    unset($_SESSION['contactos']);
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

if(!isset($_SESSION['contactos'])){
    $_SESSION['contactos']=null;
}

$nombre='';
$edad=0;
$errorNombre=$errorEdad='';

if(isset($_POST['enviar'])){

    if(!empty($_SESSION['contactos'])){
        $numContactos=sizeof($_SESSION['contactos']);
    }

    $nombre=clearData($_POST['nombre']);
    $edad=$_POST['edad'];

    if(empty($nombre)){
        $errorNombre="Error en nombre";
    }else if(empty($edad)){
        $errorEdad="Error edad";
    }else{
        $_SESSION['contactos'][$numContactos]['nombre']=$nombre;
        $_SESSION['contactos'][$numContactos]['edad']=$edad;
    }

}


function clearData($cadena){
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda contactos</title>
</head>
<body>
    <?php
        echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="post">';
        echo '<input type="text" name="nombre" value="'.$nombre.'"/><br>';
        echo '<input type="number" name="edad" value="'.$edad.'"/><br>';
        echo '<input type="submit" name="enviar" value="Enviar"/><br>';
        echo '<input type="submit" name="reiniciar" value="reiniciar"/>';
        echo '</form>';
        echo '<br>';
        echo '<h1>Contactos</h1>';
        if(!empty($_SESSION['contactos'])>0){
            foreach($_SESSION['contactos'] as $contacto){
                echo $contacto['nombre'].','.$contacto['edad'].'<br>';
            }
        }

    ?>
</body>
</html>