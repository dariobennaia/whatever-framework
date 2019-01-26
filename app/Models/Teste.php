<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 21:46
 */

namespace App\Models;

class Teste extends Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = "aplicacao";
        $this->primaryKey = "id";
        $this->atributos = ['nome','idade'];
        $this->createIfNotExists();
    }

    private function createIfNotExists()
    {
        $this->getCon()->query(
            "CREATE TABLE public.aplicacao
            (
               id serial NOT NULL,
               nome character varying(100),
               idade character varying(100),
               CONSTRAINT pk_id PRIMARY KEY (id)
            )"
        );
    }
}