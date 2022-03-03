<?php
/**
* Modelo de la tabla alumno
* @author tomashm01
*
*/
namespace App\Models;
class Alumno extends Persona
{
    private $id;
    private $notas;

    public function __construct($id, $notas,$nombre, $apellidos, $password){
        parent::__construct($nombre, $apellidos, $password);
        $this->id = $id;
        $this->notas = $notas;
    }
    public function getId(){
        return $this->id;
    }

    public function getNotas(){
        return $this->notas;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNotas($nota){
        $this->notas[] = $nota;
    }

    public function __toString(){
        return "Alumno: ".$this->getId()." ".parent::getNombre()+"<br>";
    }

    public function getAllNotas(){
        foreach ($this->notas as $key => $value) {
            echo $key . " = ". $value . "<br>";
        }
    }
}
?>