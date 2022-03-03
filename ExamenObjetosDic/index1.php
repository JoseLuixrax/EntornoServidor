<?php
require_once 'vendor/autoload.php';
use App\Models\{Alumno, Profesor};

//Añade notas al alumno
$notasTomas=array(
    "cliente"=>9,
    "servidor"=>8,
    "diseño"=>7,
);
//Creo usuario con mis datos
$alumno=new Alumno("1",$notasTomas,"Tomás","Hidalgo Martín","2122");

//Compruebo mi nombre
echo $alumno->getNombre();
echo "<br>";
//Prueba de credenciales incorrectas
if($alumno->validarPass("1234544")){
    echo "Contraseña correcta";
}else{
    echo "Contraseña incorrecta";
}
echo "<br>";
//Prueba de credenciales correctas
if($alumno->validarPass("1234")){
    echo "Contraseña correcta";
}else{
    echo "Contraseña incorrecta";
}

//Muestra las notas
echo "<br>";
echo "Notas: ";
echo "<br>";
$alumno->getAllNotas();

//Crea un profesor con su funcion
$profesor=new Profesor("Jose","Perez","1244","jefe");
//Mostrar funcion del profesor
echo "<br>";
echo "Funcion profesor: ".$profesor->getFuncion();
echo "<br>";
//Cambio de funcion del profesor
$profesor->setFuncion("coordinador");
//Muestro nueva funcion del profesor
echo "Nueva funcion: ".$profesor->getFuncion();
echo "<br>";
?>