<?php

session_start();

if(isset($_POST['enviar'])){

    $pagado=false;
    
    if(!empty($_POST['matricula']) && !empty($_POST['id']) && !empty($_POST['importe'])){

        foreach($_SESSION['multas'] as $multa){
            if($multa['id']==$_POST['id'] && $multa['matricula']==$_POST['matricula'] && $multa['importe']==$_POST['importe']){
                $id=$_POST['id']-1;
                $_SESSION['multas'][$id]['estado']="Pagada";
                $pagado=true;
            }
        }

        if($pagado){
            echo "Multa pagada correctamente";
        }else{
            echo "No se ha encontrado la multa";
        }

    }else{
        echo "Introduce todos los datos";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGAR MULTAS</title>
</head>
<body>
    <?php

        if($_SESSION['perfil']=="usuario"){
            echo "<h1>PAGAR MULTA</h1>";
            echo "<form action='pagamultas.php' method='post'>";
            echo "ID: <input type='number' name='id'><br>";
            echo "Matricula: <input type='text' name='matricula'><br>";
            echo "Importe: <input type='number' name='importe'><br>";
            echo "<input type='submit' name='enviar' value='Pagar'>";
            echo "</form>";
        }else{
            header("Location: index.php");
        }
        echo "<a href='index.php'>Index</a>";
        echo "<a href='mostrarMultas.php'>Mostrar multas</a>";
        echo "<a href='salir.php'>Salir</a>";
        echo "<a href='logout.php'>Logout</a>";
    ?>
</body>
</html>