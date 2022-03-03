<?php
/**
 * Crear un script para sumar una serie de números. El número de números a sumar será introducido en
 * un formulario.
 * @author Tomas
 */
    if(isset($_GET['num1']) && isset($_GET['num2'])){
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        echo "La suma es:". ($num1+$num2)."<br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form method="get">
        
        <label for="num">Introduce el número a sumar:</label>
        <input type="number" name="num1" id="num1">
        <label for="num">Introduce el número a sumar:</label>
        <input type="number" name="num2" id="num2">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>