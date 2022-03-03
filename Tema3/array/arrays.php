<?php
    //Array de covid
    $covid=array(
        "Cordoba"=>50,
        "Sevilla"=>14,
        "Huelva"=>100,
        "Almeria"=>130,
        "Cadiz"=>100,
        "Malaga"=>560,
        "Granada"=>80,
        "Jaen"=>100
    );

    var_dump($covid);
    echo "</br>";

    foreach($covid as $provincia=>$cantidad){
        echo "La provincia de $provincia tiene $cantidad casos";
        echo "</br>";
    }
    echo "</br>";


    //Array de familias
    $families = array (

        "Griffin"=>array ("Peter", "Lois", "Megan"),
        "Quagmire"=>array("Glenn"),
        "Brown"=>array("Cleveland", "Loretta", "Junior")
        );

    var_dump($families);
    echo "</br>";

    foreach($families as $nombre=>$apellido){
        foreach($apellido as $integrantes){
            echo $integrantes." ".$nombre;
            echo "</br>";  
        }
    }
    echo "</br>";  
    
    //Frutas
    $frutas = array(

        "manzana" => array(
        "color" => "rojo",
        "sabor" > "dulce",
        "forma" => "redondeada"),
        
        "naranja" => array(
        "color" => "naranja",
        "sabor" => "ácido",
        "forma" => "redondeada"),
        
        "plátano" => array(
        "color" =>"amarillo",
        "sabor" => "paste-y",
        "forma" => "aplatanada")
        
    );

    foreach($frutas as $tipo=>$propiedades){
        foreach($propiedades as $propiedad=>$valor){
            echo "Tipo: ".$tipo.",Propiedad:  ".$propiedad.",Valor: ".$valor;
            echo "</br>";  
        }
    }
    echo "</br>";  
?>