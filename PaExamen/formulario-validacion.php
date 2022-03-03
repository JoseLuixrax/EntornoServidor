<?php
/**
 * Ejemplo de validación en un formulario php
 * 
 * @author Javier Fernandez Rubio
 * @date 19-10-2021
 */


 /**
  * Funcion que limpia los datos del fomulario
  * de errores
  *
  * @param $data
  * @return void
  */
function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// Definimos la variables de tipo text
$name = $email = $url = $descripcion = $website = $gender="";
// Definimos las cadenas de error
$nameError = $emailError = $urlError = $websiteError = "";

// Definimos variable de tipo radiobutton con un array
$aGenero = array("Hombre","Mujer","Agenero");
$aGeneroError = "" ; // error personalizado

// Variables de tipo opciones con un array
$aVehiculos = array("Bicicleta","Coche","Patinete electrico");
// array con las opciones selecionadas
$aVehiculosSeleccionados = array();

// Opciones con valor y literal
// Observar el resultado del procesamiento
$aOpciones = array(
    array('valor' => 1, 'literal' => 'Opcion 1' ),
    array('valor' => 2, 'literal' => 'Opcion 2' ),
    array('valor' => 3, 'literal' => 'Opcion 3' ),
    array('valor' => 4, 'literal' => 'Opcion 4' )
);
$opcionEscogida = 1;

// Variable con las opciones de marcas de coches
$aMarca = array("Renault","Opel","Ford","BMW");
// array con las opciones seleccionadas
$aMarcaSeleccionados = array();

// Banderas para controlar la validacion
$lprocesaFormulario = FALSE; 
$lerror = FALSE;

// Detectamos error en la validacion de los datos del
// formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = TRUE;

    // Validacion del nombre
    if (empty($_POST["name"])) {
        $nameError = "Nombre es obligatorio";
        $lerror = true;
    } else {
        $name = clearData($_POST["name"]);
    }

    // Validacion del email
    if (empty($_POST["email"])) {
        $emailError = "Email es obligatorio";
        $lerror = true;
    } else {
        $email = clearData($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Email incorrecto";
            $lerror = true;
        }
    }

    // Validacion de la website
    if (empty($_POST["website"])) {
        $websiteError = "URL es obligatorio";
        $lerror = true;
    } else {
        $website = clearData($_POST["website"]);
    }
    
    // Validacion del comentario    
    $descripcion = clearData($_POST["descripcion"]);

    // Validacion del radiobutton genero
    if (empty($_POST["gender"])) {
        $aGeneroError = "Genero es obligatorio";
        $lerror = true;
    } else {
        $gender = clearData($_POST["gender"]);
    }

    // Vehiculos combos vehiculos
    if (isset($_POST["vehicule"])){
        $aVehiculosSeleccionados = $_POST["vehicule"];
    }

    // lista despegable de opciones
    if (isset($_POST["opciones"])){
        $opcionEscogida = $_POST["opciones"];
    }

    // Seleccion multiple de coches
    if (isset($_POST["cars"])){
        $aMarcaSeleccionados = $_POST["cars"];
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
if (!$lprocesaFormulario) { ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
       Nombre:<input type="text" name="name" value="<?php echo $name;?>">
              <span class="error">*<?php echo $nameError;?></span><br/><br/>
       Email: <input type="text" name="email" value="<?php echo $email;?>">
              <span class="error">*<?php echo $emailError;?></span><br/><br/>
       URL:   <input type="text" name="website" value="<?php echo $website;?>">
              <span class="error">*<?php echo $websiteError;?></span><br/><br/>
       Comentario:<br/>  
              <textarea name="descripcion" minlength="3" rows="5" cols="40"><?php echo $descripcion;?></textarea><br/><br/>
       Género:
          <?php
              foreach ($aGenero as $valor) {
                      $check ="";
                      if ($gender == $valor) {$check = "checked";}
                          echo "<input type=\"radio\" name=\"gender\" value = \"$valor\" $check >$valor";
              }
              echo "<span class=\"error\">*$aGeneroError</span><br/><br/>";
           ?>
     Transporte:<br/>
         <?php
             foreach ($aVehiculos as $valor) {
                $selected = (in_array($valor,$aVehiculosSeleccionados)) ? 'checked' :''; 
                echo "<input type=\"checkbox\" name=\"vehicule[]\" value = \"".$valor."\" $selected >". $valor;
            }
         ?>
     <br/><br/>
     Selecciona opción:
         <select name="opciones">
         <?php
               foreach ($aOpciones as $valor) {
                     $selected = ($opcionEscogida == $valor['valor']) ? 'selected' :''; 
                       echo "<option value =\"".$valor['valor']."\" $selected >". $valor['literal'] ."</option>";
                 }
         ?>
         </select><br/><br/>
      Selección de vehículos (múltiple):<br/>
         <select multiple name="cars[]">
         <?php
               foreach ($aMarca as $valor) {
                       $selected =(in_array($valor,$aMarcaSeleccionados)) ? 'selected' :''; 
                       echo "<option value = \"".$valor."\" $selected >". $valor ."</option>";
                 }
               ?>
         </select><br/><br/>
         <input type="submit" name="submit" value="Submit"><br/><br/>
  </form>
<?php
} // Procesa Formulario
else {
    echo "<h1>Your Input:</h1>";
    echo 'Nombre: ' . $name;
    echo "<br/>";
    echo 'Email: ' . $email;
    echo "<br/>";
    echo 'Web: ' . $website;
    echo "<br/>";
    echo 'Descipcion: ' . $descripcion;
    echo "<br/>";
    echo 'Genero: ' . $gender;
    echo "<br/>";
    //Bucle para vehículos seleccionados.
    echo "Vehiculos: ";
    foreach ($aVehiculosSeleccionados as $elemento) {
        echo $elemento."<br/>";
    }

    echo 'Opcion escogida ' . $opcionEscogida;
    echo "<br/>";

    //Bucle para coches seleccionados.
    echo "Vehiculos: ";
    foreach ($aMarcaSeleccionados as $elemento) {
        echo $elemento."<br/>";
    }
}