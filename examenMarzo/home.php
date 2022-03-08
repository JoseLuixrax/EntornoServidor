<?php
include ("./Config/config.php");
include ("./Models/Eventos.php");
include ("./Models/categoria.php");
session_start();

$eventosFiltrados=[];
//Buscar eventos
if(isset($_GET['buscador'])){

    $categoria = Categoria::getInstancia();
    $categoriasFiltradas=$categoria->filtrarPorCategoria($_GET['categoria']);
    $eventos = Eventos::getInstancia();
    $allEventos=$eventos->getAll();
    foreach($allEventos as $evento){
        foreach($categoriasFiltradas as $categoria){
            if($evento['idCategoria']==$categoria['id']){
                $eventosFiltrados[]=$evento;
            }
        }
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
    <title>Página pública</title>
</head>
<body>
<h1>Página acceso público</h1>
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
            //Buscador
            $categorias=new Categoria();
            $categorias=$categorias->getAll();
            echo "<form class=formRegistro action='home.php' method='get'>";
            echo "<label for='categoria'>Categoría: </label>";
            echo "<select name='categoria'>";
            foreach($categorias as $categoria) {
                echo "<option value=".$categoria['categoria'].">".$categoria['categoria']."</option>";
            }
            echo "</select>";
            echo "<input name='buscador' type='submit' value='Buscar'>";
            echo "</form>";

            if(count($eventosFiltrados)==0){
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Título</th>";
                echo "<th>Descripción</th>";
                echo "<th>Portada</th>";
                echo "<th>Fecha</th>";
                echo "<th>Fecha inicio patrocinio</th>";
                echo "<th>Fecha final patrocinio</th>";
                echo "<th>Categoría</th>";
                echo "</tr>";
                $eventos = new Eventos();
                $eventos=$eventos->getAll();
                foreach($eventos as $evento){
                    $esValido=true;
                    if($evento['fecha_inicio_patrocinio']==null){
                        $esValido=false;
                    }else{
                        $fechaInicioPatrocinio=strtotime($evento['fecha_inicio_patrocinio']);
                        $fechaActual=strtotime(date("Y-m-d"));
                        if($fechaInicioPatrocinio>$fechaActual){
                            $esValido=false;
                        }
                    }
                    if($esValido){
                        echo "<tr>";
                        echo "<td>" . $evento['id'] . "</td>";
                        echo "<td>" . $evento['titulo'] . "</td>";
                        echo "<td>" . $evento['descripcion'] . "</td>";
                        echo "<td><img width='100px' height='100px' src=img/".$evento['portada']."></td>";
                        echo "<td>" . $evento['fecha'] . "</td>";
                        echo "<td>" . $evento['fecha_inicio_patrocinio'] . "</td>";
                        echo "<td>" . $evento['fecha_final_patrocinio'] . "</td>";
                        echo "<td>" . $evento['idCategoria'] . "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            }else{
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Título</th>";
                echo "<th>Descripción</th>";
                echo "<th>Portada</th>";
                echo "<th>Fecha</th>";
                echo "</tr>";
                foreach ($eventosFiltrados as $evento){
                    echo "<tr>";
                    echo "<td>" . $evento['id'] . "</td>";
                    echo "<td>" . $evento['titulo'] . "</td>";
                    echo "<td>" . $evento['descripcion'] . "</td>";
                    echo "<td><img width='100px' height='100px' src=img/".$evento['portada']."></td>";
                    echo "<td>" . $evento['fecha'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
        ?>
    </main>
</body>
</html>