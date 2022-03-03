<?php

//Funcion para validar input
function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Variables
$nombre= $edad=$sexoSeleccion=$deportesSeleccion="";
$lenguajesSeleccion= array();
$estudiosSeleccion= array();
$lenguajes=array("Java","Javascript","Python");
$sexo=array("hombre","femenino");
$estudios=array("Grado Medio","Grado superior","Universidad","Bachillerato");
$deportes=array("futbol","basket","tenis");

//Variables error
$error_nombre="";
$error_edad="";
$error_lenguajes="";
$error_sexo="";
$error_estudios="";
$error_deportes="";

//flags
$lprocesaFormulario=FALSE;
$lerror = FALSE;

//Procesar formulario 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $lprocesaFormulario = TRUE;
    
    //Validar nombre
    if(empty($_POST["nombre"])){
        $error_nombre = "El nombre es obligatorio";
        $lerror = TRUE;
    }else{
        $nombre= clearData($_POST["nombre"]);
    }

    //Validar edad 
    if(empty($_POST["edad"])){
        $error_edad = "La edad es obligatoria";
        $lerror = TRUE;
    }else{
        $edad= clearData($_POST["edad"]);
    }

    //Validar lenguajes
    if(isset($_POST["lenguajes"])){
        $lenguajesSeleccion = $_POST["lenguajes"];
    }else{
        $error_lenguajes = "Debe seleccionar al menos un lenguaje";
        $lerror = TRUE;
    }

    //Validar sexo
    if(empty($_POST["sexo"])){
        $error_sexo = "El sexo es obligatorio";
        $lerror = TRUE;
    }else{
        $sexoSeleccion = $_POST["sexo"];
    }

    //Validar estudios
    if(isset($_POST["estudios"])){
        $estudiosSeleccion = $_POST["estudios"];
    }else{
        $error_estudios = "Debe seleccionar al menos un estudio";
        $lerror = TRUE;
    }

    //Validar deportes
    if(isset($_POST["deportes"])){
        $deportesSeleccion = $_POST["deportes"];
    }else{
        $error_deportes = "Debe seleccionar al menos un deporte";
        $lerror = TRUE;
    }
}


if ($lerror){
    $lprocesaFormulario = FALSE;
}

?>

<!DOCTYPE html>
<html lang="es">
    <body>
        <head>
            <style>
                .error {color: #FF0000;}
            </style>
        </head>
    </body>
</html>

<?php
if(!$lprocesaFormulario){ ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
    <span class="error">*<?php echo $error_nombre;?></span>
    <br><br>
    Edad: <input type="number" name="edad" value="<?php echo $edad;?>">
    <span class="error">*<?php echo $error_edad;?></span>
    <br><br>
    Lenguajes: <br>
    <?php
        foreach($lenguajes as $valor){
            $seleccionado=(in_array($valor,$lenguajesSeleccion)) ? 'checked' :'';
            echo "<input type=\"checkbox\"  name=\"lenguajes[]\" value=\"$valor\" $seleccionado> $valor";
        }
    ?>
    <span class="error"><?php echo $error_lenguajes;?></span>
    <br><br>
    Sexo: <br>
    <?php
        foreach($sexo as $valor){
            $check= ($valor==$sexoSeleccion) ? 'checked' : '';
            echo "<input type=\"radio\" name=\"sexo\" value=\"$valor\" $check > $valor";
        }
    ?>
    <span class="error"><?php echo $error_sexo;?></span>
    <br><br>
    Estudios: <br>
    <select multiple name="estudios[]">
        <?php
            foreach($estudios as $valor){
                $seleccionado=(in_array($valor,$estudiosSeleccion)) ? 'selected' :'';
                echo "<option value=\"$valor\" $seleccionado>$valor</option>";
            }
        ?>
    </select>
    <span class="error"><?php echo $error_estudios;?></span>
    <br><br>
    Deportes: <br>
    <select name="deportes">
        <?php
            foreach($deportes as $valor){
                echo "<option value=\"$valor\">$valor</option>";
            }
        ?>
    </select>
    <span class="error"><?php echo $error_deportes;?></span>
    <br><br>
    <input type="submit" name="submit" value="Enviar">
    <input type="reset" name="reset" value="Reset">
    </form>
     
<?php
}else{
   
    echo "Nombre: " . $nombre . "<br>";
    echo "Edad: " . $edad . "<br>";
    echo "Sexo: " . $sexoSeleccion . "<br>";
    foreach($lenguajesSeleccion as $valor){
        echo "Lenguajes: " . $valor . "<br>";
    }
    foreach($estudiosSeleccion as $valor){
        echo "Estudios: " . $valor . "<br>";
    }
    echo "Deporte: ". $deportesSeleccion . "<br>";
    
}

