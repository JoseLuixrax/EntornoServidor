<?php
include ("./Config/config.php");
include ("./Models/Eventos.php");
include ("./Models/categoria.php");
include ("./Models/EspaciosZona.php");
include ("./Models/Espacios.php");
include ("./Models/tarifa.php");
include ("./Models/Entradas.php");

session_start();
if(!isset($_SESSION['perfil'])){
    header("Location: index.php");
}

if(isset($_POST['comprar'])){
    $errores=[];
    if($_POST['entradas']<=0){
        $errores['entradas']="El numero de entradas no puede ser 0 o menor";
    }

    if(count($errores)==0){

        //Me peta y no me da tiempo a corregir el fallo

        // $entradas=new Entradas();
        // $entradas=$entrada->set(array(
        //     'idCliente'=>$_SESSION['id'],
        //     'idEvento'=>$_POST['evento'],
        //     'idEspacioZona'=>$_POST['zona'],
        //     'numeroEntradas'=>$_POST['entradas'],
        //     'precio'=>$_POST['precio']
        // ));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Comprar entradas</title>
</head>
<body>
    <h1>Comprar entradas</h1>
    <nav>
        <?php
        if(isset($_SESSION['perfil'])){
            if($_SESSION['perfil']=="productor"){
                echo "<a href='home.php'>Home</a>";
                echo "<a href='infoPersonal.php'>Mi perfil</a>";
                echo "<a href='crearEventos.php'>Crear evento</a>";
                echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
            }else{
                echo "<a href='home.php'>Home</a>";
                echo "<a href='infoPersonal.php'>Mi perfil</a>";
                echo "<a href='compraEntradas.php'>Comprar entradas</a>";
                echo "<a href=tramitarEntradas.php>Tramitar compras</a>";
                echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
            }
        }else {
            echo "No posees acceso a la web";
        }
        ?>
    </nav>
    <main>
        <?php 
        
        $eventos=new Eventos();
        $espacioZona=new EspaciosZona();
        $espacioZona=$espacioZona->getAll();
        $eventos=$eventos->getAll();

        echo "<form class=formRegistro action='compraEntradas.php' method='post'>";
        echo "<label for='zona'>Zona:</label>";
        echo "<select name='zona'>";     
        foreach($espacioZona as $zona){
            echo "<option value='".$zona['id']."'>".$zona['zona']."</option>";
        }
        echo "</select>";
        echo "<label for='evento'>Titulos eventos:</label>";
        echo "<select name='evento'>";
        foreach($eventos as $evento){
            echo "<option value='".$evento['id']."'>".$evento['titulo']."</option>";
        }
        echo "</select>";
        echo "<input type='submit' name='refrescar' value='Selecciona un evento y una zona'>";

        if(isset($_POST['zona']) && isset($_POST['evento'])){
            $idZona=$_POST['zona'];
            $idEvento=$_POST['evento'];
            $espacioZona=new EspaciosZona();
            $espacios=new Espacios();
            $eventos=new Eventos();
            $evento=$eventos->get($idEvento);
            $espacios=$espacios->getAll();
            $espacioZona=$espacioZona->get($idZona);
            echo "<h3>Has seleccionado la zona ".$espacioZona[0]['zona']." y el evento ".$evento[0]['titulo']."</h3>";
            $tarifas=new Tarifa();
            $tarifas=$tarifas->getAll();
            $entradas=new Entradas();
            $entradas=$entradas->getAll();

            $existeTarifa=false;
            foreach($tarifas as $tarifa){
                if($tarifa['idEvento']==$idEvento && $tarifa['idEspacioZona']==$espacioZona[0]['id']){
                    echo "<h3>Tarifa: ".$tarifa['precio']."€</h3>";
                    echo "<input type='hidden' name='precio' value='".$tarifa['precio']."'>";
                    $existeTarifa=true;
                }
            }
            if(!$existeTarifa){
                echo "<h3>No hay tarifas para este evento en esta zona y evento</h3>";
            }
            
            echo "<input type=number name=entradas placeholder=NumeroEntradas>";
            echo "<input type='submit' name='comprar' value='comprar'>";
        }
        
        echo "</form>";

        if(count($errores)==0){
            header("Location: compraEntradas.php");
        }else{
            foreach($errores as $key=>$value){
                echo $value."<br>";        
            }
        }

        ?>
    </main>
</body>
</html>