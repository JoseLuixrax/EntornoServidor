<?php
require_once('DBAbstractModel.php');
class Categoria extends DBAbstractModel{
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
    private $categoria;

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
        $this->query="SELECT * FROM categorias where id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll(){
        $this->query="SELECT * FROM categorias";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($categoria=''){
        $this->query="INSERT INTO categorias (categoria) VALUES (:categoria)";
        $this->parametros['categoria']=$categoria;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($id='',$categoria=''){
        $this->query="UPDATE categorias SET categoria = :categoria WHERE id = :id";
        $this->parametros['categoria']=$categoria;
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function delete($id=''){
        $this->query="DELETE FROM categorias WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function filtrarPorCategoria($categoria){
        $this->query="SELECT * FROM categorias WHERE categoria = :categoria";
        $this->parametros['categoria']=$categoria;
        $this->get_results_from_query();
        return $this->rows;
    }

}