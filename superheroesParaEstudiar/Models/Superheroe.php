<?php
require_once('DBAbstractModel.php');
class Superheroe extends DBAbstractModel{

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
    private $nombre;
    private $velocidad;


    public function __construct()
    {
       
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function get($id='') {
        $this->query = "SELECT * FROM SuperHeroe where id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getLastInsert(){
        $this->query = "SELECT * FROM SuperHeroe ORDER BY id DESC LIMIT 1";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll() {
        $this->query = "SELECT * FROM SuperHeroe";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = []) {
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $nombre=$this->nombre;
        $velocidad=$this->velocidad;
        $this->query="INSERT INTO SuperHeroe VALUES (null, :nombre, :velocidad)";
        $this->parametros['nombre']=$nombre;
        $this->parametros['velocidad']=$velocidad;      
        $this->get_results_from_query();
    }

    public function edit($data_array = []) {
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $nombre=$this->nombre;
        $velocidad=$this->velocidad;
        $id=$this->id;
        $this->query="UPDATE SuperHeroe SET nombre = :nombre, velocidad = :velocidad WHERE id = :id";
        $this->parametros['nombre']=$nombre;
        $this->parametros['velocidad']=$velocidad;
        $this->parametros['id']=$id;
        $this->get_results_from_query();
    }
   
    public function delete($id='') {
        $this->query = "DELETE FROM SuperHeroe WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }


}
