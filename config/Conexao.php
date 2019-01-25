<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 21:01
 */
namespace Config;

use Config\BancoDeDados\BancoDeDados;
use Config\BancoDeDados\PostgresSql;

abstract class Conexao
{
    private $con;

    function __construct()
    {
        $banco = new PostgresSql();
        $this->con = $this->conecta($banco);
    }

    private function conecta(BancoDeDados $bd)
    {
        return $bd->conexao();
    }

    protected function getCon()
    {
        return $this->con;
    }
}