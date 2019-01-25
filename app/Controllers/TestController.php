<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 19:21
 */

namespace App\Controllers;

use App\Models\Teste;

class TestController extends Controller
{
    public function teste()
    {
        return $this->rederView('cadastro', [
            'name' => ['asdsad', 'asqqweq'],
        ]);
    }

    public function index()
    {
        try {
            $a = new Teste();
            return $a->all();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store()
    {
        try {
            $a = new Teste();
            return $a->create([
                'nome'=>'dario',
                'idade'=>'22'
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        try {
            $a = new Teste();
            return $a->update($id,[
                'nome'=>'dario',
                'idade'=>'22'
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $a = new Teste();
            return $a->delete($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $a = new Teste();
            return $a->find($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}