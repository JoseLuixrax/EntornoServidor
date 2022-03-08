<?php
include ("./Config/config.php");
include ("./Models/Eventos.php");
include ("./Models/categoria.php");
include ("./Models/EspaciosZona.php");
include ("./Models/Espacios.php");
include ("./Models/tarifa.php");
session_start();

if(!isset($_SESSION['perfil'])){
    header("Location: index.php");
}

if(isset($_POST['crearEvento'])){
    //Validar datos del formulario
    $errores=[];
    if(!isset($_POST['titulo']) || empty($_POST['titulo'])){
        $errores['titulo']="El titulo es obligatorio";
    }
    if(!isset($_POST['descripcion']) || empty($_POST['descripcion'])){
        $errores['descripcion']="La descripción es obligatoria";
    }
    if(!isset($_POST['portada']) || empty($_POST['portada'])){
        $errores['portada']="La portada es obligatoria";
    }
    if(!isset($_POST['fecha']) || empty($_POST['fecha'])){
        $errores['fecha']="La fecha es obligatoria";
    }
    if(!isset($_POST['inicioPatrocinio']) || empty($_POST['inicioPatrocinio'])){
        $errores['inicioPatrocinio']="La fecha de inicio de patrocinio es obligatoria";
    }

    if(!isset($_POST['finPatrocinio']) || empty($_POST['finPatrocinio'])){
        $errores['finPatrocinio']="La fecha de final de patrocinio es obligatoria";
    }

    if(!isset($_POST['categoria']) || empty($_POST['categoria'])){
        $errores['categoria']="La categoria es obligatoria";
    }

    if(strtotime($_POST['inicioPatrocinio']) > strtotime($_POST['finPatrocinio'])){
        $errores['finPatrocinio']="La fecha de final de patrocinio no puede ser menor que la fecha de inicio de patrocinio";
    }

    if(strtotime($_POST['fecha']) < strtotime($_POST['inicioPatrocinio'])){
        $errores['fecha']="La fecha de inicio de patrocinio no puede ser mayor que la fecha de inicio de patrocinio";
    }

    if(strtotime($_POST['fecha']) > strtotime($_POST['finPatrocinio'])){
        $errores['fecha']="La fecha de inicio de patrocinio no puede ser mayor que la fecha de inicio de patrocinio";
    }

    if(!isset($_POST['espacio']) || empty($_POST['espacio'])){
        $errores['espacio']="El espacio es obligatorio";
    }

    //Validar precio de espaciosZonas
    $espacioZona= new EspaciosZona();
    $espacioZona=$espacioZona->getAll();
    $precio=0;
    $idEspaciosZonas=[];
    foreach($espacioZona as $espacio){
        if($espacio['idEspacio']==$_POST['espacio']){
            $idPrecio="Precio".$precio;
            if($_POST[$idPrecio]<0){
                $errores['precio']="El precio no puede ser negativo";
            }else{
                $idEspaciosZonas=$espacio['id'];
            }
            $precio++;
        }
    }

    if(count($errores)==0){
        
        $evento=new Eventos();
        $espacio=new Espacios();
        $tarifa=new Tarifa();

        $evento=$evento->set(array(
            "titulo"=>$_POST['titulo'],
            "descripcion"=>$_POST['descripcion'],
            "portada"=>$_POST['portada'],
            "fecha"=>$_POST['fecha'],
            "fecha_inicio_patrocinio"=>$_POST['inicioPatrocinio'],
            "fecha_final_patrocinio"=>$_POST['finPatrocinio'],
            "idCategoria"=>$_POST['categoria'],
            "idEspacio"=>$_POST['espacio']
        ));
        $idEvento=$evento->getLastInsertId();

        for($i=0;$i<=$precio;$i++){
            $idPrecio="Precio".$i;
            $tarifa=$tarifa->set(array(
                "precio"=>$_POST[$idPrecio],
                "idEspacioZona"=>$idEspaciosZonas[$i],
                "idEvento"=>$idEvento,              
            ));
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
    <title>Crear eventos</title>
</head>
<body>
    <h1>Crear eventos</h1>
    <nav>
        <?php
        if(isset($_SESSION)){
            if($_SESSION['perfil']=="productor"){
                echo "<a href='home.php'>Home</a>";
                echo "<a href='infoPersonal.php'>Mi perfil</a>";
                echo "<a href='crearEventos.php'>Crear evento</a>";
                echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
            }else{
                echo "<a href='home.php'>Home</a>";
                echo "<a href='infoPersonal.php'>Mi perfil</a>";
                echo "<a href='compraEntradas.php'>Comprar entradas</a>";
                echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
            }
        }else {
            echo "No posees acceso a la web";
        }
        ?>
    </nav>
    <main>
        <h2>Añadir nuevo evento</h2>
        <?php
        
        echo "<form class=formRegistro method='post' action='crearEventos.php'>";
        $espacios=new Espacios();
        $espacios=$espacios->getAll();
        echo "<label for='espacio'>Espacio:</label>";
        echo "<select name='espacio'>";
        foreach($espacios as $espacio){
            echo "<option value='".$espacio['id']."'>".$espacio['nombre']."</option>";
        }
        echo "</select>";
        echo "<input type='submit' name='refrescar' value='Selecciona un espacio'>";
        
        if(isset($_POST['espacio'])){
            
            $idEspacio=$_POST['espacio'];
            $espacio=new Espacios();
            $espacio=$espacio->get($idEspacio);
            $espacioZona=EspaciosZona::getInstancia();
            $espaciosZonas=$espacioZona->getAll();

            echo "<h3>Has seleccionado el espacio ".$espacio[0]['nombre']."</h3>";
            $precio=0;
            foreach($espaciosZonas as $espacioZona){
                if($espacioZona['idEspacio']==$idEspacio){
                    echo "<label for='zona'>".$espacioZona['zona']."</label>";
                    echo "<input type=number name='Precio".$precio++."' min='0' max='100' value='0'>";
                }
            }

            echo "<h3>Datos para el nuevo evento</h3>";
            echo "<input type=text name='titulo' placeholder='Titulo'>";
            echo "<input type=text name='descripcion' placeholder='Descripcion'>";
            echo "<input type=file name='portada' placeholder='Portada'>";
            echo "<label for='fecha'>Fecha:</label>";
            echo "<input type='datetime-local' name='fecha' placeholder='Fecha'>";
            echo "<label for='fecha'>Fecha inicio patrocinio:</label>";
            echo "<input type=date name='inicioPatrocinio' placeholder='Fecha inicio patrocinio'>";
            echo "<label for='fecha'>Fecha fin patrocinio:</label>";
            echo "<input type=date name='finPatrocinio' placeholder='Fecha fin patrocinio'>";

            $categoria=new Categoria();
            $categorias=$categoria->getAll();
            echo "<label for='categoria'>Categoria:</label>";
            echo "<select name='categoria'>";
            foreach($categorias as $categoria){
                echo "<option value='".$categoria['id']."'>".$categoria['categoria']."</option>";
            }

            echo "</select>";
            echo "<input type='submit' name='crearEvento' value='Crear evento'>";
        }
        echo "</form>";

        if(count($errores)==0){
            header("Location: crearEventos.php");
        }else{
            foreach($errores as $key=>$value){
                echo $value."<br>";        
            }
        }

        ?>
    </main>
</body>
</html>