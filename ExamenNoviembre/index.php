<?php
include('config/tests_cnf.php');

$testDisplonibles = array_map(function($v)
{return 'test: '.$v['idTest'].','.$v['Permiso'].','.$v['Categoria'];},$aTests);

?>
<!DOCTYPE HTML>
    <html lang="es">
        <head>
            <meta charset="utf-8"/>
        </head>
        <title>Examen corregido clase</title>
        <h1>Test</h1>
        <h2>Seleccione test</h2>
        <form action="mostrarTest.php" method="POST">
            <select name="numero_test">
                <?php 
                for ($i=0; $i<count($testDisplonibles); $i++) {
                    echo "<option value=\"$i\">". $testDisplonibles[$i]."</option>";                    
                }
                ?>
            </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="submitTest">
    </form>
</body>
</html>