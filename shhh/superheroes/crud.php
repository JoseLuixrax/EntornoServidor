<?php

include 'conectaBD.php';

function addHeroe($nombre,$velocidad){
    $db=conectaDB();
    $db->prepare("INSERT INTO SuperHeroe (id,nombre,velocidad) VALUES (?,?,?);")->execute(array(2,$nombre,$velocidad));
}

function removeHeroe($id){
    $db=conectaDB();
    $resultado=$db->prepare("DELETE FROM SuperHeroe WHERE id=?;");
    $resultado->execute(array($id));
    return $resultado;
}

function editHeroe($id,$nombre,$velocidad){
    $db=conectaDB();
    $resultado=$db->prepare("UPDATE SuperHeroe SET nombre= ?, velocidad=? WHERE id=?;");
    $resultado->execute(array($nombre,$velocidad,$id));
}

function getAllHeroes(){
    $db=conectaDB();
    $resultado=$db->prepare("SELECT * FROM SuperHeroe;");
    $resultado->execute();
    return $resultado->fetchAll();
}

function getHeroesById($id){
    $db=conectaDB();
    $resultado=$db->prepare("SELECT * FROM SuperHeroe WHERE id=?;");
    $resultado->execute(array($id));
    return $resultado->fetch();
}

function buscarHeroeNombre($nombre){
    $db=conectaDB();
    $resultado=$db->prepare("SELECT * FROM SuperHeroe WHERE nombre LIKE ?;");
    $resultado->execute(array("%".$nombre."%"));
    return $resultado->fetchAll();
}

function buscarHeroeVelocidad($velocidad){
    $db=conectaDB();
    $resultado=$db->prepare("SELECT * FROM SuperHeroe WHERE velocidad=?;");
    $resultado->execute(array("%".$velocidad."%"));
    return $resultado->fetchAll();
}

?>