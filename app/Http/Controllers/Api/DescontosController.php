<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desconto;
use Exception;

class DescontosController extends Controller
{
    public function show()
    {
        $descontos = Desconto::all();

        return response()->json($descontos);
    }

    public function store(Request $request, Desconto $desconto)
    {
        try{
            $desconto = new Desconto();
            $desconto->valor = $request->input('valor');

            $desconto->save();
            return response()->json("Sucesso!");
        }catch(Exception $e) {
            return response()->json('Erro ao inserir registro!');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $desconto = Desconto::findOrFail($id);
            $desconto->valor = $request->input('valor');

            $desconto->save();
            return response()->json("Sucesso!");
        }catch(Exception $e) {
            return response()->json('Erro ao editar registro!');
        }
    }

    public function delete($id)
    {
        try{
            $desconto = Desconto::findOrFail($id);
            $desconto->delete();
            return response()->json('Sucesso');
        }catch(Exception $e) {
            return response()->json('Erro ao excluir registro');
        }
    }
}
