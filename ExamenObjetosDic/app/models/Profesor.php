<?php
/**
* Modelo de la tabla profesor
* @author tomashm01
*
*/
namespace App\Models;
class Profesor extends Persona{
    
    private $funcion;

    public function __construct($nombre, $apellido, $password, $funcion) {
        parent::__construct($nombre, $apellido, $password);
        if(static::validarFuncion($funcion)){
            $this->funcion = $funcion;
        }else{
            $funcion = "";
        }
        $this->funcion = $funcion;
    }

    public function getFuncion() {
        return $this->funcion;
    }

    public function setFuncion($funcion) {
        if(static::validarFuncion($funcion)){
            $this->funcion = $funcion;
        }else{
            $funcion = "";
        }
        $this->funcion = $funcion;
    }
    
    public static function validarFuncion($funcion) {
        if(!empty($funcion)){
            if($funcion!="tutor" && $funcion!="jefe" && $funcion!="coordinador" && $funcion!="profesor"){
                return false;
            }
            return true;
        }else{
            return false;
        }
    }
}
?>