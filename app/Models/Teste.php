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
        $this->table = "teste";
        $this->primaryKey = "id";
        $this->atributos = ['nome','idade'];
    }
}