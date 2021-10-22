<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function show()
    {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    public function store(Request $request, Produto $produto)
    {
        try{
            $produto = new Produto;
            $produto->nome = $request->input('nome');

            $produto->save();
            return response()->json("Sucesso!");
        }catch(Exception $e) {
            return response()->json('Erro ao inserir registro!');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $produto = Produto::findOrFail($id);
            $produto->nome = $request->input('nome');

            $produto->save();
            return response()->json("Sucesso!");
        }catch(Exception $e) {
            return response()->json('Erro ao editar registro!');
        }
    }

    public function delete($id)
    {
        try{
            $produto = Produto::findOrFail($id);
            $produto->delete();
            return response()->json('Sucesso');
        }catch(Exception $e) {
            return response()->json('Erro ao excluir registro');
        }
    }
}
