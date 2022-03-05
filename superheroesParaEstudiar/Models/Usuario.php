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
    private $rol;

    public function __construct()
    {
       
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function get($id='') {
        $this->query = "SELECT * FROM Usuario where id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll() {
        $this->query = "SELECT * FROM Usuario";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = []) {
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $this->query="INSERT INTO Usuario VALUES (null, :nombre, :password, :rol)";
        $this->get_results_from_query();
    }

    public function edit($data_array = []) {
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $this->query="UPDATE Usuario SET usuario = :usuario, password = :password, rol = :rol WHERE id = :id";
        $this->get_results_from_query();
    }

    public function delete($id='') {
        $this->query = "DELETE FROM Usuario WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }

    public function comprobarUser($nombre,$password){
        $this->query = "SELECT * FROM Usuario where nombre = :usuario and password = :password";
        $this->parametros['usuario'] = $nombre;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        return $this->rows;
    }

}

?>