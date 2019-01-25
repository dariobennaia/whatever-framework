<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 21:28
 */

namespace Config\BancoDeDados;

class PostgresSql implements BancoDeDados
{

    const HOST = "192.168.1.14";
    const PORT = "5432";
    const USER = "postgres";
    const PASS = "senha";
    const DB   = "teste";

    public function conexao()
    {
        try {
            return new \PDO('pgsql:dbname='.self::DB.';host='.self::HOST,self::USER, self::PASS);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}