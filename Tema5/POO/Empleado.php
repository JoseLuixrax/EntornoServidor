<?php

/**
 * Confeccionar una clase Empleado, definir como atributos su nombre y sueldo. 
 * Definir un método inicializar que lleguen como dato el nombre y sueldo. 
 * Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos 
 * (si el sueldo supera a 3000 paga impuestos).
 * @author Tomas
 */

 class Empleado{
        private $nombre;
        private $sueldo;
        
        public function __construct($nombre, $sueldo){
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }

        public function getData(){
            //Llamada a funcion paga3000
            return $this->nombre . " con sueldo " . $this->sueldo;
        }

        public function pagar3000(){
            if($this->sueldo > 3000){
                return "Paga impuestos";
            }
            return "No paga impuesto";
        }
 }


?>