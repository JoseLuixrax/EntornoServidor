<?php

/**
* Modelo de la tabla alumno
* @author tomashm01
*
*/
namespace App\Models;

interface svg2{
    public function dibujar();
    public function calcularArea();
}

class Rectangulo extends Figura implements svg2{

    private $ancho;
    private $alto;

    public function __construct($color,$x, $y,$ancho,$alto){
        parent::__construct($color, $x,$y);
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function setColores($color){
        parent::setColor($color);
    }

    public function getColores(){
        return parent::getColores();
    }

    public function getAncho(){
        return $this->ancho;
    }

    public function getAlto(){
        return $this->alto;
    }

    public function setAncho($ancho){
        $this->ancho = $ancho;
    }

    public function setAlto($alto){
        $this->alto = $alto;
    }

    public function dibujar(){
        return '<rect width="'.$this->ancho.'" height="'.$this->alto.'" style="fill:'.parent::getColores().'" />';
    }

    public function calcularArea(){
        return $this->ancho * $this->alto;
    }
}


?>