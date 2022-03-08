<?php
require_once('DBAbstractModel.php');
class Perfiles extends DBAbstractModel{
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

    private $perfil;
    public function __construct()
    {

    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function get($id=''){

        
    }

    public function getAll(){
        $this->query="SELECT * FROM perfiles";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = []){
        
    }

    public function edit($data_array = []){
        
    }

    public function delete($id=''){
        
    }


}