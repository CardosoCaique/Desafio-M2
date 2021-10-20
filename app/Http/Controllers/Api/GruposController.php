<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Exception;

class GruposController extends Controller
{
    public function show()
    {
        $grupos = Grupo::all();
        return response()->json($grupos);
    }

    public function store(Request $request, Grupo $grupo)
    {
        try {
            $grupo = new Grupo();
            $grupo->nome = $request->input('nome');
            $grupo->descricao = $request->input('descricao');

            $grupo->save();
            return response()->json('Sucesso');
        }catch(Exception $e) {
            return response()->json('Erro ao inserir registro!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->nome = $request->input('nome');
            $grupo->descricao = $request->input('descricao');

            $grupo->save();
            return response()->json('Sucesso');
        } catch (Exception $e) {
            return response()->json('Erro ao editar registro!');
        }

    }

    public function delete($id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->delete();
            return response()->json('Sucesso');
        } catch (Exception $e) {
            return response()->json('Erro ao excluir registro!');
        }

    }
}
