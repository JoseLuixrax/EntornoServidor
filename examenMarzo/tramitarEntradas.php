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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tramitar entradas</title>
</head>
<body>
    <h1>Ver entradas compradas</h1>
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
        $entradas=new Entradas();
        $misEntradas=$entradas->getAll();
        $eventos=new Eventos();

        //No me da tiempo a poner mas detalles de la entrada
        foreach($misEntradas as $entrada){
            if($entrada['idCliente']==$_SESSION['id']){
                $evento=$eventos->get($entrada['idEvento']);
                echo "<div class='entrada'>";
                echo "<h2>".$evento[0]['titulo']."</h2>";
                echo "<p>Espectaculo del día ".$evento[0]['fecha']."</p>";
                echo "<p>Numero entradas compradas:".$entrada['numeroEntradas']."</p>";
                echo "<p>Precio:".$entrada['importe']."</p>";
                $sumatotal+=$entrada['importe']*$entrada['numeroEntradas'];
            }
        }

       echo "<h2>Total gastado:".$sumatotal."</h2>";

        ?>
    </main>
</body>
</html>