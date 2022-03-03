<?php
/**
 * Ejercicio 3
 * Crea un formulario de login que permita al usuario recordar los datos introducidos. Incluye una
 * opción para borrar la información almacenada.
 * @author Tomas
 */
$bandera=false;
$cookies=[];
$usuario=$_COOKIE['usuario'] ?? "";
$passwd=$_COOKIE['contrasena'] ?? "";
$recordar=false;
$_GET['borrar']=false;

function clearData($cadena){   
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
}   

if(isset($_POST['enviar'])){
    $usuario=clearData($_POST['usuario']);
    $passwd=clearData($_POST['contrasena']);
    $bandera=true;
    $recordar=$_POST['recordar']??false;
    if($recordar){
        setcookie('usuario',$usuario,time()+3600);
        setcookie('contrasena',$passwd,time()+3600);
    }else{
        setcookie('usuario',$usuario,time()-3600);
        setcookie('contrasena',$passwd,time()-3600);
    }
}

if($_GET['borrar']==true){
    $recordar=false;
    setcookie('usuario',$usuario,time()-3600);
    setcookie('contrasena',$passwd,time()-3600);
    $bandera=false;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>


    <?php
        if($bandera){   
            echo 'Usuario: '.$usuario.'<br>';
            echo 'Password: '.$passwd.'<br>';
            echo '<a href="ej3.php?borrar=true">Eliminar cookies</a>';
        }else{
            echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="post">';
            echo '<input type="text" name="usuario" value="'.$usuario.'"/><br>';
            echo '<input type="password" name="contrasena" value="'.$passwd.'"/><br>';
            echo '<input type="checkbox" name="recordar" value="recordar"/>Recordar<br>';
            echo '<input type="submit" name="enviar" value="Enviar"/><br>';
            echo '</form>';
        }   
    ?>
</body>
</html>