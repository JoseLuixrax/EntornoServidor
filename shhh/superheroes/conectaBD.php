<?php 

function conectaDB()
{
    try {
        $db =new PDO("mysql:host=localhost;dbname=SuperHeroes",'root', '');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return($db);
    } 
    catch (PDOException $e) {
        echo "Error conexión";
        exit();
    }
}