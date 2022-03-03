<?php
/**
 * Formulario para crear un currículum que incluya: Campos de texto, grupo de botones de opción, casilla
 * de verificación, lista de selección única, lista de selección múltiple, botón de validación, botón de
 * imagen, botón de reset, etc.
 * @author Tomas
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum</title>
</head>
<body>
    <form name="formulario" method="post" action="procesar.php">
        Nombre: <input type="text" name="nombre" id="nombre">
        Apellido: <input type="text" name="apellidos">
        <br>
        Edad: <input type="number" name="edad" min="0" max="100">
        Pais: <select name="pais" id="pais">
            <option value="España" selected>España </option>
            <option value="Peru" >Perú </option>
            <option value="Argentina" >Argentina</option>
        </select>
        Lenguajes que dominas: 
        <input type="checkbox" name="lenguaje[]" value="PHP">PHP
        <input type="checkbox" name="lenguaje[]" value="Javascript">Javascript
        <input type="checkbox" name="lenguaje[]" value="Java">Java
        <br>
        Años que llevas programando: 
        <input type="radio" name="programar" value="1">1 año
        <input type="radio" name="programar" value="2">2 años
        <input type="radio" name="programar" value="3">3 años
        <input type="submit" value="Enviar" action="procesar.php">
        <input type="reset" value="Resetear">
    </form>
</body>
</html>