<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 22:03
 */
namespace App\Models;

use Config\Conexao;

abstract class Model extends Conexao
{
    protected $table;
    protected $primaryKey;
    protected $atributos;

    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function all()
    {
        $return = [];

        try {
            $con = $this->getCon();
            $query = $con->query('select * from '.$this->table);
            $return = [];

            foreach ($query as $i => $row) {
                $return[] = $row;
            }

            return $return;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $return;
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function find($id)
    {
        $return = [];

        try {
            $con = $this->getCon();
            $query = $con->query("SELECT * FROM $this->table WHERE $this->primaryKey = $id");
            $return = [];

            foreach ($query as $i => $row) {
                $return[] = $row;
            }

            return $return;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $return;
        }
    }

    /**
     * @param $param
     * @param $operacao
     * @param $value
     * @return array
     */
    public function where($param, $operacao, $value)
    {
        $return = [];

        try {
            $con = $this->getCon();
            $query = $con->query("SELECT * FROM $this->table WHERE $param $operacao '$value'");
            $return = [];

            foreach ($query as $i => $row) {
                $return[] = $row;
            }

            return $return;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $return;
        }
    }

    /**
     * @param array $params
     * @return bool
     */
    public function create(array $params)
    {
        try {
            $result = $this->trataDadosInsert($params);
            $this->getCon()->query("INSERT INTO $this->table (".$result['atributos'].") VALUES (".$result['params'].")");
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($id, array $params)
    {
        try {
            $result = $this->trataDadosUpdate($params);
            $this->getCon()->query("UPDATE $this->table SET $result WHERE $this->primaryKey = $id");
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $this->getCon()->query("DELETE FROM $this->table WHERE $this->primaryKey = $id");
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    private function trataDadosInsert(array $params)
    {
        $total = count($this->atributos);
        $atributosTratados = $paramsTratados = "";
        foreach ($this->atributos as $i => $value) {
            $atributosTratados .= $i+1===$total?$value:"$value,";
            $paramsTratados    .= $i+1===$total?"'$params[$value]'":"'$params[$value]',";
        }
        $return['atributos'] = $atributosTratados;
        $return['params'] = $paramsTratados;
        return $return;
    }

    /**
     * @param array $params
     * @return string
     */
    private function trataDadosUpdate(array $params)
    {
        $total = count($this->atributos);
        $return = "";
        foreach ($this->atributos as $i => $value) {
            $return .= $i+1===$total?"$value = '$params[$value]'":"$value = '$params[$value]',";
        }
        return $return;
    }
}