<?php

$datosPersonales = array(
    "nombre" => array(
        "tipo" => "text",
        "valor"=>"Tomas"
    ),
    "apellidos" => array(
        "tipo" => "text",
        "valor"=>"Hidalgo Martin"
    ),
    "direccion" => array(
        "tipo" => "text",
        "valor"=>"Cordoba",
    ),
    "curso" => array(
        "tipo" => "radio",
        "valor" =>array(
            "1DAW",
            "1ASIR",
            "2DAW",
            "2ASIR"
        )
    ),
    "repetidor"=>array(
        "tipo" => "radio",
        "valor"=>array(
            "Si",
            "No"
        )
    )
);

echo ("<form action=\" mostrar.php \" method=\"post\">");

foreach ($datosPersonales as $data => $array) {
    foreach($array as $props =>$value){
        if($props=="tipo" && $value=="text"){
            echo("
            <label>Info
                <input type=\" ".$value." \" name=\"".$data ."\"value=\"".$array["valor"]."\">
            </label><br>
            ");
        }else if($props="tipo" && $value=="radio"){
            foreach($array["valor"] as $valor){
                echo("
                <label>'$valor'
                <input type=\"radio\" name=\"".$data ."\"value=\"".$valor."\">
                </label><br>
                ");
            }
        }
    }
}
echo("<input type=\"submit\" value=\"Enviar\">");
echo ("</form>");

?>