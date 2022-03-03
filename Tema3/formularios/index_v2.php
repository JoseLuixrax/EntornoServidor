<?php
function clearData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
$nombre = $email = $gender = $observaciones = $redSocial = "";

$errorNombre = $errorEmail =$errorRedSocial = "";

$aCurso = ["1DAW","2DAW","1ASIR","2ASIR"];

$aIdentificacion =["DNI","Pasaporte"];
$aIdentificacionSeleccionada = [];

$aTipoDeVia = ["Pasaje","Calle","Avenida"];

$seleccionados =[];

$aOpciones = [["valor"=>1,"literal"=>"Opcion 1"],["valor"=>2,"literal"=>"Opcion 2"],
["valor"=>3,"literal"=>"Opcion 3"],
["valor"=>4,"literal"=>"Opcion 4"]];
$opcionSeleccionada = 1;

$procesaFormulario = FALSE;

$error = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $procesaFormulario = TRUE;

    if (empty($_POST["nombre"])) {
        $errorNombre = "Nombre no insertado ";
        $error = TRUE;
    }
    else {
        $nombre = clearData($_POST["nombre"]);
    }
    if (empty($_POST["email"])) {
        $errorNombre = "email no insertado ";
        $error = TRUE;
    }
    else {
        $email = clearData($_POST["email"]);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errorEmail = "Formato de correo incorrecto";
            $error = TRUE;
        }
    }
    if (empty($_POST["redSocial"])) {
        $errorNombre = "red social no insertado ";
        $error = TRUE;
    }
    else {
        $redSocial = clearData($_POST["nombre"]);
        if (!filter_var($email,FILTER_VALIDATE_URL)) {
            $errorEmail = "Formato de enlace a red social incorrecto";
            $error = TRUE;
        }
    }
    $observaciones = clearData($_POST["observaciones"]);
    
    if (empty($_POST["tipoDeVia"])) {
        $errorNombre = "Via no insertada ";
        $error = TRUE;
    }
    
}
if (!$procesaFormulario) { ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
       Nombre:<input type="text" name="name" value="<?php echo $name;?>">
              <span class="error">*<?php echo $nameErr;?></span><br/><br/>
       email: <input type="text" name="email" value="<?php echo $email;?>">
              <span class="error">* <?php echo $Err;?></span><br/><br/>
       URL:   <input type="text" name="website" value="<?php echo $website;?>">
              <span class="error"><?php echo $websiteErr;?></span><br/><br/>
       Commentario:<br/>  
              <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br/><br/>
       Género:
          <?php
              foreach ($aGenero as $clave=>$valor) {
                      $check ="";
                      if ($gender == $valor) {$check = "checked";}
                          echo "<input type=\"radio\" name=\"gender\" value = \"$valor\" $check>$valor";
              }
              echo "<span class=\"error\">* $genderErr</span><br/><br/>";
           ?>
     Transporte:<br/>
         <?php
             foreach ($aVehiculos as $valor) {
                   $selected =(in_array($valor,$aVehiculosSeleccionados)) ? 'checked' :''; 
                     echo "<input type =\"checkbox\" name=\"vehicle[]\" value = \"".$valor."\" $selected >". $valor;
               }
         ?>
     <br/><br/>
     Selecciona opción:
         <select name="combo">
         <?php
               foreach ($aOpciones as $valor) {
                     $selected =($opcionSeleccionada == $valor['valor']) ? 'selected' :''; 
                       echo "<option value = \"".$valor['valor']."\" $selected >". $valor['literal'] ."</option>";
                 }
         ?>
         </select><br/><br/>
      Selección de vehículos (múltiple):<br/>
         <select multiple name="cars[]">
         <?php
               foreach ($cars as $valor) {
                       $selected =(in_array($valor,$carsSeleccionados)) ? 'selected' :''; 
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
    echo $name;
    echo "<br/>";
    echo $email;
    echo "<br/>";
    echo $website;
    echo "<br/>";
    echo $comment;
    echo "<br/>";
    echo $gender;
    echo "<br/>";
    //Bucle para vehículos seleccionados.
    foreach ($aVehiculosSeleccionados as $elemento) {
        echo $elemento."<br/>";
    }

    echo $opcionSeleccionada;
    echo "<br/>";

    //Bucle para coches seleccionados.
    foreach ($carsSeleccionados as $elemento) {
        echo $elemento."<br/>";
    }
}
?>