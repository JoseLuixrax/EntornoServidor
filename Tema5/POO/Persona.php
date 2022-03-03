<?php

/**
 *  Confeccionar una clase Persona que tenga como atributos el nombre y la edad. 
 * Definir un método que cargue los datos personales y otro que los imprima.
 * Plantear una segunda clase Empleado que herede de la clase Persona. 
 * Añadir un atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
 * Definir un objeto de la clase Persona y llamar a sus métodos. 
 * También crear un objeto de la clase Empleado y llamar a sus métodos.
 * @author Tomas
 * 
 */

    class Persona{
        private $nombre;
        private $edad;
        
        public function __construct($nombre, $edad){
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
        
        public function cargarDatos(){
            echo "Nombre: ".$this->nombre."<br>";
            echo "Edad: ".$this->edad."<br>";
        }
        
        public function imprimirDatos(){
            echo "Nombre: ".$this->nombre."<br>";
            echo "Edad: ".$this->edad."<br>";
        }
    }

    class Empleado extends Persona{
        private $sueldo;

        public function __construct($nombre, $edad, $sueldo){
            parent::__construct($nombre, $edad);
            $this->sueldo = $sueldo;
        }

        public function cargarSueldo(){
            echo "Sueldo: ".$this->sueldo."<br>";
        }

        public function imprimirSueldo(){
            echo "Sueldo: ".$this->sueldo."<br>";
        }
    }


?>