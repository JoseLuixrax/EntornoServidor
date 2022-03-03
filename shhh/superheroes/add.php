<?php
require 'crud.php';
if(isset($_POST['enviar'])){ //Añadir heroe
    $nombre=$_POST['nombre'];
    $velocidad=$_POST['velocidad'];
    addHeroe($nombre,$velocidad);
}
?>
<a href="index.php">Atrás</a>
<h1>Añadir heroe</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <label for="velocidad">Velocidad:</label>
    <input type="number" name="velocidad">
    <input type="submit" name="enviar" value="Añadir">
</form>