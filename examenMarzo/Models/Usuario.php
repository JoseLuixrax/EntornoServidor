<?php
require_once('DBAbstractModel.php');
class Usuario extends DBAbstractModel{
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {

            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function ___clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
    private $id;
    private $usuario;
    private $password;
    private $email;
    private $perfiles_perfil;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getAll(){
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get($id=''){
        $this->query = "SELECT * FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = []){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $usuario=$this->usuario;
        $password=$this->password;
        $email=$this->email;
        $perfiles_perfil=$this->perfiles_perfil;
        //Insertar perfil en la base de datos perfiles en la tabla perfiles
        $this->query="INSERT INTO perfiles VALUES(:perfiles_perfil)";
        $this->parametros['perfiles_perfil']=$perfiles_perfil;
        $this->query="INSERT INTO usuarios VALUES (null,:usuario,:password,:email,:perfiles_perfil)";
        $this->parametros['usuario']=$usuario;
        $this->parametros['password']=$password;
        $this->parametros['email']=$email;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($data_array = []){

    }

    public function delete($id=''){
        $this->query = "DELETE FROM usuarios WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }
    
    public function comprobarDatos($data_array = []){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $email=$this->email;
        $password=$this->password;
        $this->query = "SELECT * FROM usuarios WHERE email = :email AND password = :password";
        $this->parametros['email']=$this->email;
        $this->parametros['password']=$this->password;
        $this->get_results_from_query();
        return $this->rows;
    }

}