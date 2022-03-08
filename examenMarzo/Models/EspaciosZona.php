<?php
require_once('DBAbstractModel.php');
class EspaciosZona extends DBAbstractModel{
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
    private $zona;
    private $idEspacio;

    public function getAll(){
        $this->query = "SELECT * FROM espacios_zona";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get($id=''){
        $this->query = "SELECT * FROM espacios_zona WHERE id = $id";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $zona=$this->zona;
        $idEspacio=$this->idEspacio;
        $this->query = "INSERT INTO espacios_zona VALUES (null,:zona,:idEspacio)";
        $this->parametros['zona'] = $zona;
        $this->parametros['idEspacio'] = $idEspacio;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $id=$this->id;
        $zona=$this->zona;
        $idEspacio=$this->idEspacio;
        $this->query = "UPDATE espacios_zona SET zona = :zona, idEspacio = :idEspacio WHERE id = $id";
        $this->parametros['zona'] = $zona;
        $this->parametros['idEspacio'] = $idEspacio;
        $this->parametros['id'] =$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function delete($id=''){
        $this->query = "DELETE FROM espacios_zona WHERE id = $id";
        $this->get_results_from_query();
        return $this->rows;
    }

}