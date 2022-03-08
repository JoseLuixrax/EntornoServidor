<?php
require_once('DBAbstractModel.php');
class Eventos extends DBAbstractModel{
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
    private $titulo;
    private $descripcion;
    private $portada;
    private $fecha;
    private $fecha_inicio_patrocinio;
    private $fecha_final_patrocinio;
    private $idCategoria;
    private $idEspacio;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPortada()
    {
        return $this->portada;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getFecha_inicio_patrocinio()
    {
        return $this->fecha_inicio_patrocinio;
    }

    public function getFecha_final_patrocinio()
    {
        return $this->fecha_final_patrocinio;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function get($id=''){
        $this->query="SELECT * FROM eventos where id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
        
    }

    public function getAll(){
        $this->query="SELECT * FROM eventos";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = []){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $titulo=$this->titulo;
        $descripcion=$this->descripcion;
        $portada=$this->portada;
        $fecha=$this->fecha;
        $fecha_inicio_patrocinio=$this->fecha_inicio_patrocinio;
        $fecha_final_patrocinio=$this->fecha_final_patrocinio;
        $idCategoria=$this->idCategoria;
        $idEspacio=$this->idEspacio;
        $this->query="INSERT INTO eventos VALUES (null, :titulo, :descripcion, :portada, :fecha, :fecha_inicio_patrocinio, :fecha_final_patrocinio, :idCategoria, :idEspacio)";
        $this->parametros['titulo']=$titulo;
        $this->parametros['descripcion']=$descripcion;
        $this->parametros['portada']=$portada;
        $this->parametros['fecha']=$fecha;
        $this->parametros['fecha_inicio_patrocinio']=$fecha_inicio_patrocinio;
        $this->parametros['fecha_final_patrocinio']=$fecha_final_patrocinio;
        $this->parametros['idCategoria']=$idCategoria;
        $this->parametros['idEspacio']=$idEspacio;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($data_array = []){
        foreach ($data_array as $key => $value) {
            $this->$key = $value;
        }
        $id=$this->id;
        $titulo=$this->titulo;
        $descripcion=$this->descripcion;
        $portada=$this->portada;
        $fecha=$this->fecha;
        $fecha_inicio_patrocinio=$this->fecha_inicio_patrocinio;
        $fecha_final_patrocinio=$this->fecha_final_patrocinio;
        $idCategoria=$this->idCategoria;
        $idEspacio=$this->idEspacio;
        $this->query="UPDATE eventos SET titulo = :titulo, descripcion = :descripcion, portada = :portada, fecha = :fecha, fecha_inicio_patrocinio = :fecha_inicio_patrocinio, fecha_final_patrocinio = :fecha_final_patrocinio, idCategoria = :idCategoria , idEspacio = :idEspacio WHERE id = :id";
        $this->parametros['titulo']=$titulo;
        $this->parametros['descripcion']=$descripcion;
        $this->parametros['portada']=$portada;
        $this->parametros['fecha']=$fecha;
        $this->parametros['fecha_inicio_patrocinio']=$fecha_inicio_patrocinio;
        $this->parametros['fecha_final_patrocinio']=$fecha_final_patrocinio;
        $this->parametros['idCategoria']=$idCategoria;
        $this->parametros['id']=$id;
        $this->parametros['idEspacio']=$idEspacio;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function delete($id=''){
        $this->query="DELETE FROM eventos WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getLastInsert(){
        $this->query="SELECT * FROM eventos ORDER BY id DESC LIMIT 1";
        $this->get_results_from_query();
        return $this->rows;
    }

}