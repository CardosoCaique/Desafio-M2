<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadesController extends Controller
{
    public function show()
    {
        $cidades = Cidade::all();

        return response()->json($cidades);
    }

    public function store(Request $request, Cidade $cidade)
    {
        try {
            $cidade = new Cidade();
            $cidade->nome = $request->input('nome');
            $cidade->grupo_id = $request->input('grupo_id');
            $cidade->uf = $request->input('uf');

            $cidade->save();
            return response()->json('Sucesso');
        }catch(Exception $e) {
            return response()->json('Erro ao inserir registro!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $cidade = Cidade::findOrFail($id);
            $cidade->nome = $request->input('nome');
            $cidade->grupo_id = $request->input('grupo_id');
            $cidade->uf = $request->input('uf');

            $cidade->save();
            return response()->json('Sucesso');
        } catch (Exception $e) {
            return response()->json('Erro ao editar registro!');
        }

    }

    public function delete($id)
    {
        try {
            $cidade = Cidade::findOrFail($id);
            $cidade->delete();
            return response()->json('Sucesso');
        } catch (Exception $e) {
            return response()->json('Erro ao excluir registro!');
        }

    }
}
