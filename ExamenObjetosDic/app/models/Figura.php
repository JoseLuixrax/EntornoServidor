<?php
/**
* Modelo de la tabla alumno
* @author tomashm01
*
*/
namespace App\Models;
class Figura{
    
    private $colores;
    private $dimensionX;
    private $dimensionY;

    public function __construct($colores, $dimensionX, $dimensionY){
        $this->colores = $colores;
        $this->dimensionX = $dimensionX;
        $this->dimensionY = $dimensionY;
    }

    public function getColores(){
        return $this->colores;
    }

    public function getDimensiones(){
        return "x= ".$this->dimensionX." y= ".$this->dimensionY;
    }

    public function getDimensionX(){
        return $this->dimensionX;
    }

    public function getDimensionY(){
        return $this->dimensionY;
    }
    
    public function setColor($color){
        $this->colores = $color;
    }

    public function setDimensiones($dimensionX,$dimensionY){
        $this->dimensionX = $dimensionX;
        $this->dimensionY = $dimensionY;
    }

}

?>