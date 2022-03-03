<?php

require 'crud.php';
$cargaHeroe=false;

if(!empty($_GET['id']) && $_GET['editar']){
    $cargaHeroe=true;
    $heroe=getHeroesById(intval($_GET['id']));
    $id=$_GET['id'];
    $nombre=$heroe['nombre'];
    $velocidad=$heroe['velocidad'];
    if(isset($_POST['enviar'])){
        editHeroe(intval($id),$nombre,$velocidad);
    }
}

var_dump($_GET);
?>
<a href="index.php">Atrás</a>

<?php

if($cargaHeroe){
    echo '<h1>Editar heroe</h1>';
    echo '<p>Características del heroe:</p>';
    echo '<ul>';
    echo '<li>ID: '.$id.'</li>';
    echo '<li>Nombre: '.$nombre.'</li>';
    echo '<li>Velocidad: '.$velocidad.'</li>';
    echo '</ul>';
}else{
    echo '<h1>Error al cargar el heroe</h1>';
}

?>

<form action="<?php echo $_SERVER['PHP_SELF?id='.$id.'&editar=true']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <label for="velocidad">Velocidad:</label>
    <input type="number" name="velocidad" id="velocidad">
    <input type="submit" name="enviar" value="Editar">
</form>