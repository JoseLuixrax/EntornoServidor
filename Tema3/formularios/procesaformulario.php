<?php
echo "Nombre: ".$_POST["nombre"]."</br>";
echo "Apellidos: ".$_POST["apellidos"]."</br>"; 

echo "Suma: ".($_POST["num1"]+$_POST["num2"])."</br>";

$datosPersonales=array(
    "nombre"=>"tomas",
    "apellidos"=>"hidalgo martin"
);

var_dump($datosPersonales);


?>