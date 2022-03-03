<?php
/**
 * Ejercicio 3
 * Incorpora a tu servidor un mensaje que indique al usuario el tiempo transcurrido desde su último
 * acceso y un mensaje personalizado en función de éste.
 * @author Tomas
 */
date_default_timezone_set('UTC');
$bandera=false;
$cookies=[];
$usuario=$_COOKIE['usuario'] ?? "";
$passwd=$_COOKIE['contrasena'] ?? "";
$recordar=false;
$fecha=date('H:m:s');
define("ULTIMACONEXION",'');
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
    $ULTIMACONEXION=$fecha;
    if($recordar){
        setcookie('usuario',$usuario,time()+3600);
        setcookie('contrasena',$passwd,time()+3600);
        setcookie('fecha',$fecha,time()+3600);
        
    }else{
        setcookie('usuario',$usuario,time()-3600);
        setcookie('contrasena',$passwd,time()-3600);
        setcookie('fecha',$fecha,time()-3600);
    }
}
    

if($_GET['borrar']==true){
    $recordar=false;
    setcookie('usuario',$usuario,time()-3600);
    setcookie('contrasena',$passwd,time()-3600);
    setcookie('fecha',$fecha,time()-3600);
    $bandera=false;
    $ULTIMACONEXION=$fecha;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>

    <?php
        if($bandera){   
            echo 'Usuario: '.$usuario.'<br>';
            echo 'Password: '.$passwd.'<br>';
            echo 'Ultima conexion: '.$ULTIMACONEXION.'<br>';
            echo '<a href="ej5.php?borrar=true">Eliminar cookies</a>';
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