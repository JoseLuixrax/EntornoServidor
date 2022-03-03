<?php

require("ej3.php");

if(isset($_POST["enviar"])){
    $paisSeleccionado=$_POST["pais"];
    foreach($pais as $key=>$value){
        if($key==$paisSeleccionado){
            echo "<h3>La capital de ".$key." es ".$value["capital"]."</h3>";
            echo "<img src='".$value["bandera"]."' width='100px' height='100px'>";
        }
    }
}    
?>