<?php
/**
* Modelo de la tabla Persona
* @author tomashm01
*
*/
namespace App\Models;
class Persona{ 
    private $nombre; 
    private $apellidos;
    private $user;
    private $pass;
    private static $expregContrasena="/^[0-9]{4}$/";

    public function __construct($nombre, $apellidos,$password) {
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->user = $nombre." ".$apellidos;
       if(static::validarPass($password)){
        $this->pass = $password;
        }else{
            $password = "";
        }
        $this->pass = $password;
    }
    public function getNombre() {
        return $this->nombre . " " . $this->apellidos;
    }
    public function getApellidos() {
        return $this->apellidos;
    }
    public function getUser() {
        return $this->user;
    }
    public function getPass() {
        return $this->pass;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    public function setPass($pass) {
        if(static::validarPass($pass)){
            $this->pass = $pass;    
        }
    }
    public static function validarPass($password){
        if(preg_match(static::$expregContrasena,$password)){
            return true;
        }else{
            return false;
        }
    }
    public function getNombreCompleto() {
        return $this->nombre." ".$this->apellidos+"<br>";
    }

}
?>