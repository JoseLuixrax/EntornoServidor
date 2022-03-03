<?php
namespace App\Models;

class Evolucion extends DBAbstractModel{
    private static $instancia;
    
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {

            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __construct($evolucion){
        $this->evolucion=$evolucion;
    }

    public function get(){
        $this->query="SELECT * FROM Evolucion WHERE evolucion=:evolucion";
        $this->parametros['evolucion']=$this->evolucion;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll(){
        $this->query="SELECT * FROM Evolucion";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set(){
        
    }

    public function delete(){
        $this->query="SELECT * FROM Evolucion WHERE evolucion=:evolucion";
        $this->parametros=array(':evolucion'=>$this->evolucion);
        $this->get_results_from_query();
        if(count($this->rows)==1){
            $this->mensaje="Evolucion encontrada";
            return $this->rows;
        }else{
            $this->mensaje="Evolucion no encontrada";
        }
    }

    public function edit(){
        
    }
}