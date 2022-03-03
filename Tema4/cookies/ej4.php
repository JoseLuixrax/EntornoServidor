<?php
/**
 * Ejercicio 4
 * Crea un contador el numero de veces que ha visitado la pagina
 * @author Tomas
 */
$contador=intval($_COOKIE['contador'])+1 ?? 1;
$_GET['eliminar']=false;

if(isset($contador)){
    setcookie("contador",strval($contador),time()+5);
}else{
    setcookie("contador","1",time()-5);
}

if($_GET['eliminar']==true){
    $contador=1;
    setcookie("contador",strval($contador),time()-5);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        echo 'Has accedido a este sitio '.$contador.' veces'.'<br>';
        echo '<a href="ej4.php?eliminar=true">Resetear</a> ';
    ?>
</body>
</html>