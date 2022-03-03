<?php
require_once 'vendor/autoload.php';
use App\Models\{Circulo, Rectangulo};

//Creo circulo
$x=100;
$y=200;
$circulo=new Circulo("green",$x,$y,10);
//Creo svg para dibujar Circulo
echo "<svg width='".($x+100)."' height='".($y+100)."'>";
echo $circulo->dibujar();
echo "</svg>";
echo "<br>";
//Muestro area circulo 
echo "El area del circulo es: ".$circulo->calcularArea();
echo "<br>";

//Modifico circulo 
$circulo->setColores("red");
$circulo->setRadio(20);
echo "<svg width='".($x+100)."' height='".($y+100)."'>";
echo $circulo->dibujar();
echo "</svg>";
echo "<br>";
//Modifico area circulo
echo "El area del circulo es: ".$circulo->calcularArea();
echo "<br>";

//Creo rectangulo
$x=100;
$y=200;
$rectangulo=new Rectangulo("green",$x,$y,10,20);
//Creo svg para dibujar Rectangulo
echo "<svg width='".($x+100)."' height='".($y+100)."'>";
echo $rectangulo->dibujar();
echo "</svg>";
echo "<br>";

//Muestro area rectangulo
echo "El area del rectangulo es: ".$rectangulo->calcularArea();
echo "<br>";

//Modifico rectangulo
$rectangulo->setColores("red");
$rectangulo->setAlto(20);
$rectangulo->setAncho(30);

//Creo svg para dibujar Rectangulo
echo "<svg width='".($x+100)."' height='".($y+100)."'>";
echo $rectangulo->dibujar();
echo "</svg>";
echo "<br>";

//Modifico area rectangulo
echo "El area del rectangulo es: ".$rectangulo->calcularArea();
echo "<br>";



?>