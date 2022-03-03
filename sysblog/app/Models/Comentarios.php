<?php
/**
 * Modelo Comentarios
 */

namespace App\Models;

//require 'DBAbstractModel.php';
class Comentarios extends DBAbstractModel
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
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    // Constructor
    public function _construct()
    {
    }

    /* == Atributos == */
    private $id;
    private $blog_id;
    private $usuario;
    private $contenido;
    private $aprobado;
    private $created_at;
    private $updated_at;

    /* == Métodos CRUD ==  */
    public function get($id = '')
    {
        $this->query = "SELECT * FROM comment
        WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM comment";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data_array = [])
    {
        foreach ($data_array as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO comment VALUES(null, :blod_id, :usuario, :contenido, :aprobado)";
        $this->execute_single_query();
    }

    public function edit($id = '', $data_array = [])
    {
        foreach ($data_array as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE comment SET blog_id = :blog_id, user = :usuario, contenido = :contenido, approved = :aprobado WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->execute_single_query();
    }

    public function delete($id = '')
    {
        $this->query = "DELETE FROM comment WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->execute_single_query();
    }
}
