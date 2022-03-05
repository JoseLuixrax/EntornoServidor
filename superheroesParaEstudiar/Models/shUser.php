<?php
require_once('DBAbstractModel.php');
class shUser extends DBAbstractModel{

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
    private $idUser;
    private $idHeroe;


    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    public function getIdHeroe(){
        return $this->idHeroe;
    }

    public function get($id=''){
        
    }

    public function getAllHeroes($idUser){
        $this->query="SELECT * FROM sh_User where idUser = :idUser order by idHeroe";
        $this->parametros['idUser']=$idUser;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = []){
        
    }

    public function delete($id=''){
        
    }

    public function edit($data_array = []){
        
    }


}
