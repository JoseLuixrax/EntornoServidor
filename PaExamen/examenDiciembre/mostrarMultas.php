<?php

session_start();

if(!isset($_SESSION['multas'])){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOSTRAR MULTAS</title>
</head>
<body>
    <?php
            
        echo "<a href='index.php'>Index</a>";
        echo "<a href='logout.php'>Logout</a>";
        echo "<h1>TABLA MULTAS</h1>";

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>idAgente</th>";
        echo "<th>Matricula</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Fecha</th>";
        echo "<th>Importe</th>";
        echo "<th>Estado</th>";

        foreach ($_SESSION['multas'] as $multa) {
            echo "<tr>"."<br>";
            echo "<td>".$multa['id']."</td>";
            echo "<td>".$multa['idAgente']."</td>";
            echo "<td>".$multa['matricula']."</td>";
            echo "<td>".$multa['descripcion']."</td>";
            echo "<td>".$multa['fecha']."</td>";
            echo "<td>".$multa['importe']."</td>";
            echo "<td>".$multa['estado']."</td>";
            echo "</tr>";
        }

        echo "</tr>";
        echo "</table>";
        echo "<br>";
    ?>
</body>
</html>