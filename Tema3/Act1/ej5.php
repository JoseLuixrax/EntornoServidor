<?php

/**
 * Script que muestre una lista de enlaces en función del perfil de usuario: 
 * Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4 
 * Perfil Usuario: Pagina1, Pagina2
 * @author Tomas
 */
$perfil="Administrador";
    if($perfil=="Administrador"){
        echo "<ul>";
        echo "<li><a href='Pagina1.php'>Pagina1</a></li>";
        echo "<li><a href='Pagina2.php'>Pagina2</a></li>";
        echo "<li><a href='Pagina3.php'>Pagina3</a></li>";
        echo "<li><a href='Pagina4.php'>Pagina4</a></li>";
        echo "</ul>";
    }else if($perfil=="Usuario"){
        echo "<ul>";
        echo "<li><a href='Pagina1.php'>Pagina1</a></li>";
        echo "<li><a href='Pagina2.php'>Pagina2</a></li>";
        echo "</ul>";
    }else{
        echo "Perfil no reconocido";
    }


?>