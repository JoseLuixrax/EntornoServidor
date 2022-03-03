<?php
/**
 * Modelo Blog
 */

namespace App\Models;

class Blog extends DBAbstractModel
{
    /* == Modelo Singleton == */
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
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    // Constructor vacio
    function _construct()
    {
    }

    /* == Atributos y Variables == */
    private $id;
    private $titulo;
    private $autor;
    private $contenido;
    private $imagen;
    private $tags;
    private $created_at;
    private $updated_at;
    private $contenido2 = [];

    /* == Métodos CRUD == */
    public function get($id = '')
    {
        $this->query = "SELECT * FROM blog
    WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    static function getAll()
    {
        $this->query = "SELECT * FROM blog";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = [])
    {
        foreach ($data_array as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO blog VALUES(null, :titulo, :autor, :contenido, :imagen, :tags)";
        $this->execute_single_query();
    }

    public function edit($id = '', $data_array = [])
    {
        foreach ($data_array as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE blog SET titulo = :titulo, autor = :autor, contenido = :contenido, imagen = :imagen, tags = :tags WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->execute_single_query();
    }

    public function delete($id = '')
    {
        $this->query = "DELETE FROM blog WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->execute_single_query();
    }
}