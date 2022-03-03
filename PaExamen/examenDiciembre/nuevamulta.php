<?php
    session_start();

    if(isset($_POST['enviar'])){
        if(!empty($_POST['matricula']) && !empty($_POST['fecha']) && !empty($_POST['importe']) && !empty($_POST['descripcion'])){
            
            $matricula = $_POST['matricula'];
            $fecha = $_POST['fecha'];
            $importe = $_POST['importe'];
            $descripcion = $_POST['descripcion'];

            $fecha = date("Y-m-d", strtotime($fecha));
            $_SESSION['numMultas']=$_SESSION['numMultas']+1;
            array_push($_SESSION['multas'], array("id"=>$_SESSION['numMultas']+1,"idAgente"=>$_SESSION['id'],"matricula"=>$matricula, "descripcion"=>$descripcion, "fecha"=>$fecha, "importe"=>$importe,"estado"=>"No pagada"));
        }
        header("Location: nuevamulta.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DE MULTAS</title>
</head>
<body>
    <?php
        if($_SESSION["perfil"]=="agente"){
            echo "<a href='agente.php'>Home</a>";
            echo "<a href='nuevamulta.php'>Gestion de multas</a>";
            echo "<a href='salir.php'>Salir</a>";
            echo "<a href='logout.php'>Logout</a>";

            echo "<h1>TABLA MULTAS</h1>";

            //TABLA DE MULTAS
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

            //NUEVA MULTA
            echo "<h1>NUEVA MULTA</h1>";
            echo "<form action='nuevamulta.php' method='post'>";
            echo "Matricula: <input type='text' name='matricula'><br>";
            echo "Descripcion: <input type='text' name='descripcion'><br>";
            echo "Fecha: <input type='date' name='fecha'><br>";
            echo "Importe: <input type='number' name='importe'><br>";
            echo "<input type='submit' name='enviar' value='Enviar'>";
            echo "</form>";

            }
    ?>
</body>
</html>