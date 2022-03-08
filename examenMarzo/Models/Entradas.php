<?php
require_once('DBAbstractModel.php');
class Entradas extends DBAbstractModel{
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
    private $idCliente;
    private $idEvento;
    private $idEspacioZona;
    private $numeroEntradas;
    private $precio;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function get($id=''){
        $this->query="SELECT * FROM entradas where id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll(){
        $this->query="SELECT * FROM entradas";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array=[]){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $idCliente=$this->idCliente;
        $idEvento=$this->idEvento;
        $idEspacioZona=$this->idEspacioZona;
        $numeroEntradas=$this->numeroEntradas;
        $precio=$this->precio;
        $this->query="INSERT INTO entradas VALUES (:idCliente, :idEvento, :idEspacioZona, :numeroEntradas, :precio)";
        $this->parametros['idCliente']=$idCliente;
        $this->parametros['idEvento']=$idEvento;
        $this->parametros['idEspacioZona']=$idEspacioZona;
        $this->parametros['numeroEntradas']=$numeroEntradas;
        $this->parametros['precio']=$precio;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($data_array=[]){
        
    }

    public function delete($id=''){
        $this->query="DELETE FROM entradas WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }

}


