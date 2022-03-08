<?php
require_once('DBAbstractModel.php');
class Tarifa extends DBAbstractModel{
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
    private $idEspacioZona;
    private $precio;
    private $idEvento;


    public function getAll(){
        $this->query = "SELECT * FROM tarifas";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get($id=''){
        $this->query = "SELECT * FROM tarifas WHERE id = $id";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $idEspacioZona=$this->idEspacioZona;
        $precio=$this->precio;
        $idEvento=$this->idEvento;
        $this->query = "INSERT INTO tarifas VALUES (null,:idEspacioZona,:precio,:idEvento)";
        $this->parametros['idEspacioZona'] = $idEspacioZona;
        $this->parametros['precio'] = $precio;
        $this->parametros['idEvento'] = $idEvento;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $id=$this->id;
        $idEspacioZona=$this->idEspacioZona;
        $precio=$this->precio;
        $idEvento=$this->idEvento;
        $this->query = "UPDATE tarifas SET idEspacioZona = :idEspacioZona, precio = :precio, idEvento = :idEvento WHERE id = $id";
        $this->parametros['idEspacioZona'] = $idEspacioZona;
        $this->parametros['precio'] = $precio;
        $this->parametros['idEvento'] = $idEvento;
        $this->parametros['id'] =$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function delete($id=''){
        $this->query = "DELETE FROM tarifas WHERE id = $id";
        $this->get_results_from_query();
        return $this->rows;
    }

}