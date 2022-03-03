<?php
session_start();
include 'config/conf.php';

if(!isset($_SESSION['rol'])){
    $_SESSION['rol']='INVITADO';
}

if(!isset($_SESSION['pizzas'])){
    $_SESSION['pizzas']=$aPizzas;
}

function sinEspaciosMinuscula($cadena){
    $cadena=str_replace(' ','',$cadena);
    return strtolower($cadena);
}
var_dump($_SESSION['pizzas']);

if(isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['telefono'])){ //Usuario invitado

    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $pizzasSeleccionadas=$_SESSION['pizzas'];
    $cantidades=$_POST['cantidades'];
    $factura=array(
        'nombre'=>$nombre,
        'telefono'=>$telefono,
        'pizzas'=>array($pizzasSeleccionadas),
        'total'=>0
    );

    //Sumo valor sin descuento
    foreach($pizzasSeleccionadas as $key=>$pizza){
        //Calculo el precio total de la factura
        $factura['total']+=$cantidades[$key]*$aPizzas[$key]['precio'];
    }

    //Elimino cookies si existen
    if(!empty($_COOKIE)){
        foreach($_COOKIE as $key=>$cookie){
            setcookie($key,$cookie,time()-3600);
        }   
    }
    //Inserto las nuevas cookies
    foreach($pizzasSeleccionadas as $key=>$pizza){
        setcookie($key,sinEspaciosMinuscula($pizza),time()+3600);
    }

}else if(isset($_POST['enviar'])){ //Usuario registrado

    $nombre=$_SESSION['nombre'];
    $telefono=$_SESSION['telefono'];
    $pizzasSeleccionadas=$_SESSION['pizzas'];
    $cantidades=$_POST['cantidades'];
    $factura=array(
        'nombre'=>$nombre,
        'telefono'=>$telefono,
        'pizzas'=>array($pizzasSeleccionadas),
        'total'=>0
    );

    //Sumo valor con descuento si es un cliente
    foreach($pizzasSeleccionadas as $key=>$pizza){
        $factura['total']+=$cantidades[$key]*$aPizzas[$key]['precio'];
    }
    $factura['total']*=0.9;

    //Elimino cookies si existen
    if(!empty($_COOKIE)){
        foreach($_COOKIE as $key=>$cookie){
            setcookie($key,$cookie,time()-3600);
        }   
    }
    //Inserto las nuevas cookies
    foreach($pizzasSeleccionadas as $key=>$pizza){
        setcookie($key,sinEspaciosMinuscula($pizza),time()+3600);
    }
}

//Eliminar cookies
if(isset($_POST['eliminar'])){
    foreach($_COOKIE as $key=>$cookie){
        setcookie($key,$cookie,time()-3600);
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar pizzas</title>
</head>
<body>
    <?php
        if($_SESSION['rol']=='CLIENTE'){
            echo '<h1>Nuevo pedido</h1>';
            echo '<form action="publico.php" method="post">';

            foreach($_SESSION['pizzas'] as $pizza){
                echo '<label for="'.$pizza['tipo'].'">'.$pizza['tipo'].':</label>';
                echo '<input type="checkbox" name="pizzas[]" value="'.$pizza['tipo'].'" id="'.$pizza['tipo'].'">';
                echo '<br>';
                echo '<label for="cantidad'.$pizza['tipo'].'">Cantidad:</label>';
                echo '<input type="number" name="cantidades[]" min="0" max="10" value="0">';
                echo '<br>';
                echo '<label for="'.$pizza['tipo'].'">Precio: '.$pizza['precio'].'€</label>';
                echo '<br>';
                echo '<img src="img/'.sinEspaciosMinuscula($pizza['tipo']).'.jpg" align="center" width="150px" height="150px" alt="'.$pizza['tipo'].'">';
                echo '<br>';
                echo '<br>';
            }

            echo '<input type="submit" name="enviar" value="Enviar">';
            echo '<input type="submit" name="eliminar" value="Resetear">';
            echo '</form>';
            echo '<a href="index.php">Volver</a>';
            echo '<br>';
            echo '<a href="logout.php">Cerrar sesión</a>';
            echo '<br>';
            echo '<a href="salir.php">Salir</a>';

        }else if($_SESSION['rol']=="ADMINISTRADOR"){ //Usuario administrador
            header('Location: admin.php');
        }
        else{ 
        echo '<h1>Nuevo pedido</h1>';
        echo '<form action="publico.php" method="post">';
        //Nombre y telefono del cliente
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" name="nombre">';
        echo '<br>';
        echo '<label for="telefono">Telefono:</label>';
        echo '<input type="number" name="telefono">';
        echo '<br>';
        echo '<br>';
        //Recorro las pizzas del array
        foreach($_SESSION['pizzas'] as $pizza){
            echo '<label for="'.$pizza['tipo'].'">'.$pizza['tipo'].':</label>';
            echo '<input type="checkbox" name="pizzas[]" value="'.$pizza['tipo'].'" id="'.$pizza['tipo'].'">';
            echo '<br>';
            echo '<label for="cantidad'.$pizza['tipo'].'">Cantidad:</label>';
            echo '<input type="number" name="cantidades[]" min="0" max="10" value="0">';
            echo '<br>';
            echo '<label for="'.$pizza['tipo'].'">Precio: '.$pizza['precio'].'€</label>';
            echo '<br>';
            echo '<img src="img/'.sinEspaciosMinuscula($pizza['tipo']).'.jpg" align="center" width="150px" height="150px" alt="'.$pizza['tipo'].'">';
            echo '<br>';
            echo '<br>';
        }
        echo '<input type="submit" name="enviar" value="Enviar">';
        echo '<input type="submit" name="eliminar" value="Resetear">';
        echo '</form>';
        echo '<a href="index.php">Volver</a>';
    }

    ?>
</body>
</html>