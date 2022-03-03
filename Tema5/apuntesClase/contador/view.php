<?php
require_once("contador.php");
$c1=new Contador();
for($i=0;$i<10;$i++){
    $c1->count();
}
echo $c1->toString();
echo '<br>';
$c2=new Contador();
for($i=0;$i<50;$i++){
    $c2->count();
}
echo $c2->toString();
echo '<br>';
$c3=new Contador();
for($i=0;$i<34;$i++){
    $c3->count();
}
echo $c3->toString();
echo '<br>';
echo 'Numero instancias: '.Contador::countInstance();
?>