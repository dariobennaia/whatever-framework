<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 24/01/2019
 * Time: 19:21
 */

namespace App\Controllers;

use App\Models\Teste;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    /**
     * @return mixed|string
     */
    public function index()
    {
        try {
            $a = new Teste();
            return $this->rederView('listagem', ['dados'=>$a->all()]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->rederView('formulario');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        try {
            $a = new Teste();
            $a->create([
                'nome'=>$request->get('nome'),
                'idade'=>$request->get('idade')
            ]);
            return json_encode(['sucesso'=>true,'msg'=>'Sucesso!']);
        } catch (\Exception $e) {
            return json_encode(['sucesso'=>false,'msg'=>$e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function formAtualizar($id)
    {
        try {
            $a = new Teste();
            return $this->rederView('formulario', ['dados'=>$a->find($id),'form_start'=>'']);
        } catch (\Exception $e) {
            return $this->rederView('formulario', ['sucesso'=>false,'msg'=>$e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return string
     */
    public function update($id, Request $request)
    {
        try {
            $a = new Teste();
            $a->update($id, [
                'nome'=>$request->get('nome'),
                'idade'=>$request->get('idade')
            ]);
            return json_encode(['sucesso'=>true,'msg'=>'Sucesso!']);
        } catch (\Exception $e) {
            return json_encode(['sucesso'=>false,'msg'=>$e->getMessage()]);
        }
    }

    /**
     * @param string $id
     * @return string
     */
    public function delete($id)
    {
        try {
            $a = new Teste();
            $a->delete($id);
            return json_encode(['sucesso'=>true,'msg'=>'Sucesso!']);
        } catch (\Exception $e) {
            return json_encode(['sucesso'=>false,'msg'=>$e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function show($id)
    {
        try {
            $a = new Teste();
            return json_encode(['sucesso'=>true,'msg'=>'Sucesso!', 'dados'=>$a->find($id)]);
        } catch (\Exception $e) {
            return json_encode(['sucesso'=>false,'msg'=>$e->getMessage()]);
        }
    }
}