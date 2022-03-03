<?php

/**
 *  Confeccionar la clase Tabla vista en conceptos anteriores. 
 * Plantear una clase Celda que colabore con la clase Tabla. 
 * La clase Tabla debe definir una matriz de objetos de la clase Celda.
 * La clase Celda debe definir los atributos: $texto, $colorFuente y $colorFondo.
 * @author Tomas
 */
    require_once "Tabla.php";

    class Celda extends Tabla{
        private $texto;
        private $colorFuente;
        private $colorFondo;

        public function __construct($texto, $colorFuente, $colorFondo){
            $this->texto = $texto;
            $this->colorFuente = $colorFuente;
            $this->colorFondo = $colorFondo;
        }

        public function mostrar(){
            parent::mostrarDatos();
            echo "<td style='color:$this->colorFuente; background-color:$this->colorFondo'>$this->texto</td>";
        }

        public function getTexto(){
            return $this->texto;
        }

        public function getColorFuente(){
            return $this->colorFuente;
        }

        public function getColorFondo(){
            return $this->colorFondo;
        }

        public function setTexto($texto){
            $this->texto = $texto;
        }

        public function setColorFuente($colorFuente){
            $this->colorFuente = $colorFuente;
        }

        public function setColorFondo($colorFondo){
            $this->colorFondo = $colorFondo;
        }

        public function __toString(){
            return "Texto: " . $this->texto . " Color Fuente: " . $this->colorFuente . " Color Fondo: " . $this->colorFondo;
        }



    }


?>