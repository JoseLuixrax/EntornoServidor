<?php
include ("./Config/config.php");
include("./Models/Superheroe.php");
include("./Models/Usuario.php");
session_start();

if(isset($_GET['id'])){
    $deleteHeroe=new Superheroe();
    $deleteHeroe->delete($_GET['id']);
    header("Location: misHeroes.php");
}else{
    header("Location: misHeroes.php");
}


