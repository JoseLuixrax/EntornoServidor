<?php
require_once('DBAbstractModel.php');
class Espacios extends DBAbstractModel{
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


    public function getAll(){
        $this->query = "SELECT * FROM espacios";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get($id=''){
        $this->query = "SELECT * FROM espacios WHERE id = $id";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $nombre=$this->nombre;
        $this->query = "INSERT INTO espacios VALUES (null,:nombre)";
        $this->parametros['nombre'] = $nombre;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $id=$this->id;
        $nombre=$this->nombre;
        $this->query = "UPDATE espacios SET nombre = :nombre WHERE id = $id";
        $this->parametros['nombre'] = $nombre;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function delete($id=''){
        $this->query = "DELETE FROM espacios WHERE id = $id";
        $this->get_results_from_query();
        return $this->rows;
    }

}