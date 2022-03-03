<?php
require "../bootstrap.php";

use App\Models\Evolucion;

$evolucion=new Evolucion("Principiante");
var_dump($evolucion->get());