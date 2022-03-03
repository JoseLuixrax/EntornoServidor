<?php
/**
 * Crear una aplicación que almacene información de países: nombre capital y bandera. Diseñar un
 * formulario que permita seleccionar un país y nos muestre el nombre de la capital y la bandera.
 * @author Tomas
 */

    $pais=array(
        "España"=>array(
            "capital"=>"Madrid",
            "bandera"=>"https://comprarbanderas.online/wp-content/uploads/2019/11/bandera-de-espana-ce.png"
        ),
        "Francia"=>array(
            "capital"=>"Paris",
            "bandera"=>"https://www.gemelolandia.com/pub/media/catalog/product/cache/8f63bbe8ca7e8be5c89d9c970fca547a/f/r/francia.png"
        ),
        "Italia"=>array(
            "capital"=>"Roma",
            "bandera"=>"https://www.banderasphonline.com/wp-content/uploads/2020/03/comprar-bandera-italia-para-exterior-interior.png"
        )
    ); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacenar paises</title>
</head>
<body>
    <form method="post" action="validarBanderas.php">
        Pais: <select name="pais" id="pais">
            <option value="España" selected>España </option>
            <option value="Francia" >Francia </option>
            <option value="Italia" >Italia</option>
        </select>
        <input name="enviar" type="submit" value="Enviar">
    </form>
</body
</html>