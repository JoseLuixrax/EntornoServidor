<?php

session_start();

$usuarios=array(
    array("id"=>0,"usuario"=>"admin","psw"=>"admin","nombre"=>"Administrador","perfil"=>"administrador"),
    array("id"=>1,"usuario"=>"agente1","psw"=>"agente1","nombre"=>"Agente 1","perfil"=>"agente"),
    array("id"=>2,"usuario"=>"agente2","psw"=>"agente2","nombre"=>"Agente 2","perfil"=>"agente"),
    array("id"=>3,"usuario"=>"usuario1","psw"=>"usuario1","nombre"=>"Usuario 1","perfil"=>"usuario")
);

$multas=array(
    array("id"=>1,"idAgente"=>1,"matricula"=>"12345","descripcion"=>"Multa 1","fecha"=>"01/01/2019","importe"=>20,"estado"=>"No pagada"),
    array("id"=>2,"idAgente"=>1,"matricula"=>"123465","descripcion"=>"Multa 2","fecha"=>"01/01/2019","importe"=>20,"estado"=>"Pagada"),
);

$idMultas=count($multas);

if(!isset($_SESSION['perfil'])){
    $_SESSION['perfil']="";
}

if(!isset($_SESSION['auth'])){
    $_SESSION['auth']=false;
    $_SESSION['nombre']="";
    $_SESSION['psw']="";
}

if(isset($_SESSION['multas'])){
    $multas=$_SESSION['multas'];
    $idMultas=count($multas)-1;
    $_SESSION['numMultas']=$idMultas;
}else{
    $_SESSION['multas']=$multas;
    $idMultas=count($multas);
    $_SESSION['numMultas']=$idMultas;
}

if(isset($_POST['nombre']) && (isset($_POST['psw']))){
    $nombre=$_POST['nombre'];
    $psw=$_POST['psw'];
    $auth=false;
    foreach($usuarios as $usuario){
        if($usuario['usuario']==$nombre && $usuario['psw']==$psw){
            $_SESSION['auth']=true;
            $auth=true;
            $_SESSION['nombre']=$nombre;
            $_SESSION['psw']=$psw;
            $_SESSION['numMultas']=$idMultas;
            $_SESSION['perfil']=$usuario['perfil'];
            if($usuario['perfil']=="agente" || $usuario['perfil']=="administrador"){
                $_SESSION['multas']=$multas;
            }
            $_SESSION['id']=$usuario['id'];
            break;
        }
    }
    if(!$auth){
        echo "Usuario o contraseña incorrectos";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Tomás">
    <title>Tomás Hidalgo Martín</title>
</head>
<body>
    <?php
     
    if($_SESSION["perfil"]=="usuario"){
        echo "<h1>Bienvenido ".$_SESSION["nombre"]."</h1>";
        echo "<a href='pagamultas.php'>Pagar multas</a>";
        echo "<a href='mostrarMultas.php'>Mostrar multas</a>";
        echo "<a href='salir.php'>Salir</a>";
        echo "<a href='logout.php'>Logout</a>";
    }else if($_SESSION["perfil"]=="agente"){
        header('Location: agente.php');
    }else if($_SESSION["perfil"]=="administrador"){
        header('Location: admin.php');
    }else{
        echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="post">';
        echo "<label for='usuario'>Usuario</label>";
        echo '<input type="text" name="nombre" value="'.$_SESSION['nombre'].'"/><br>';
        echo "<label for='psw'>Contraseña</label>";
        echo '<input type="password" name="psw" value="'.$_SESSION['psw'].'"/><br>';
        echo "<input type='submit' value='Entrar'>";
        echo "</form>";
        echo "<a href='mostrarMultas.php'>Mostrar multas</a>";
    }
    
    ?>
</body>
</html>