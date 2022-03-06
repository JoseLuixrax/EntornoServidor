<?php
include ("./Config/config.php");
include("./Models/Superheroe.php");
include("./Models/Usuario.php");
include("./Models/shUser.php");
session_start();
$heroeEncontrado = [];

if(isset($_GET['buscador'])){
    $sh=new shUser();
    $sh=$sh->getAllHeroes($_SESSION['id']);
    foreach($sh as $superheroe){
        $heroe=new Superheroe();
        $heroe=$heroe->get($superheroe['idHeroe']);
        if($heroe[0]['nombre']==$_GET['nombreHeroe']){
            $heroeEncontrado=$heroe[0];
        }
    }
}

if(isset($_POST['addHeroe'])){
    $heroe=new Superheroe();
    $nombreImagen = $_FILES['imagenHeroe']['name'];
    $heroe->set(array(
        "nombre"=>$_POST['nombreHeroe'],
        "velocidad"=>$_POST['velocidadHeroe'],
        "foto"=>$nombreImagen
    ));
    $heroeInsertado=$heroe->getLastInsert();
    $sh=new shUser();
    $sh->set(array(
        "idUser"=>$_SESSION['id'],
        "idHeroe"=>$heroeInsertado[0]['id']
    ));
    unset($_POST['addHeroe']);
    unset($_POST['nombreHeroe']);
    unset($_POST['velocidadHeroe']);
    unset($_FILES['imagenHeroe']);
    header("Location: misHeroes.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mis superheroes</title>
</head>
<body>
<h1>Superheroes</h1>
    <nav>
        <?php
        if(isset($_SESSION['usuario'])) {
            echo "<a href='home.php'>Home</a>";
            echo "<a href='misHeroes.php'>Mis superheroes</a>";
            echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
        } else {
            echo "<a href='home.php'>Home</a>";
            echo "<a href='index.php'>Iniciar sesión</a>";
        }

        ?>
    </nav>

    <main>
        <?php
        
        if(isset($_SESSION['usuario'])){

            echo "<form class='formRegistro' action='misHeroes.php' method='get'>";
            echo "<input type='text' name='nombreHeroe' placeholder='Buscar'>";
            echo "<input type='submit' name='buscador' value='Buscar'>";
            echo "</form>";
            echo "<br>";

            echo "<form class='formRegistro' action='misHeroes.php' method='post'>";
            echo "<input type='text' name='nombreHeroe' placeholder='Nombre del superheroe' required>";
            echo "<input type='number' name='velocidadHeroe' placeholder='Velocidad del superheroe' required>";
            echo "<input type='file' name='imagenHeroe' required>";
            echo "<input type='submit' name='addHeroe' value='Añadir'>";
            echo "</form>";

            $misHeroes=new shUser();
            $misHeroes=$misHeroes->getAllHeroes($_SESSION['id']);
            if(count($misHeroes)==0){
                echo "<p>No tienes superheroes</p>";
            }else{
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Velocidad</th>";
                echo "<th>Imagen</th>";
                echo "<th>Editar heroes</th>";
                echo "<th>Borrar heroes</th>";
                echo "</tr>";

                $directorio = $_SERVER['DOCUMENT_ROOT'].'/Servidor/superheroesParaEstudiar/img/';
                
                $heroes=new Superheroe();
                foreach($misHeroes as $heroe){
                    $miHeroe=$heroes->get($heroe['idHeroe']);
                    $foto="img/".$miHeroe[0]['foto'];
                    echo "<tr>";
                    echo "<td>".$miHeroe[0]['id']."</td>";
                    echo "<td>".$miHeroe[0]['nombre']."</td>";
                    echo "<td>".$miHeroe[0]['velocidad']."</td>";
                    echo "<td><img src=$foto width='50' height='50'></td>";
                    echo "<td><a href='editarHeroe.php?id=".$miHeroe[0]['id']."'>Editar</a></td>";
                    echo "<td><a href='borrarHeroe.php?id=".$miHeroe[0]['id']."'>Borrar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if(count($heroeEncontrado)!=0){
                echo "<h2>Heroe encontrado</h2>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Velocidad</th>";
                echo "<th>Editar heroes</th>";
                echo "<th>Borrar heroes</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>".$heroeEncontrado['id']."</td>";
                echo "<td>".$heroeEncontrado['nombre']."</td>";
                echo "<td>".$heroeEncontrado['velocidad']."</td>";
                echo "<td><a href='editarHeroe.php?id=".$heroeEncontrado['id']."'>Editar</a></td>";
                echo "<td><a href='borrarHeroe.php?id=".$heroeEncontrado['id']."'>Borrar</a></td>";
                echo "</tr>";
                echo "</table>";
            } else {
                echo "<h2>Heroe encontrado</h2>";
                echo "<p>No se ha encontrado el heroe</p>";
            }
        } else {
            echo "<p>No tienes permisos para ver esta página</p>";
        }
        ?>
    </main>

</body>
</html>