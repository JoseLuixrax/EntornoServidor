<?php

/**
* Modelo de la tabla alumno
* @author tomashm01
*
*/
namespace App\Models;

interface svg{
    public function dibujar();
    public function calcularArea();
}

class Circulo extends Figura implements svg{
        
        private $radio;
        private $x;
        private $y;

        public function __construct($color, $x,$y,$radio){
            parent::__construct($color, $x,$y);
            $x=parent::getDimensionX();
            $y=parent::getDimensionY();
            $this->radio = $radio;
        }

        public function setColores($color){
            parent::setColor($color);
        }

        public function getColores(){
            return parent::getColores();
        }

        public function getX(){
            return $this->x;
        }

        public function getY(){
            return $this->y;
        }
        
        public function getRadio(){
            return $this->radio;
        }

        public function setRadio($radio){
            $this->radio = $radio;
        }

        public function setColor($color){
            parent::setColor($color);
        }

        public function dibujar(){
            return '<circle cx="'.parent::getDimensionX().'" cy="'.parent::getDimensionY().'" r="'.$this->getRadio().'" fill="'.$this->getColores().'"/>';
        }

        public function calcularArea(){
            return pi()*pow($this->getRadio(),2);
        }
}
?>