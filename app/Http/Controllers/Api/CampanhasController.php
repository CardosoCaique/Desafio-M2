<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campanha;
use App\Models\CampanhaProduto;
use Exception;

class CampanhasController extends Controller
{
    public function show()
    {
        $campanhas = Campanha::all();

        return response()->json($campanhas);
    }

    public function store(Request $request, Campanha $campanha)
    {
        try {
            /*if(Campanha::where('grupo_id', $request->input('grupo_id'))->first())
                return response()->json("Esse grupo já possui uma campanha ativa!");*/

            $campanha = Campanha::create([
                "grupo_id" => $request->input('grupo_id'),
                "identificacao" => $request->input('identificacao'),
                "descricao" => $request->input('descricao')
            ]);

            $produtos = $request->input('produtos');
            return $this->setProdutoCampanha($campanha->id, $produtos);
        }catch(Exception $e) {
            return response()->json('Erro ao inserir registro!');
        }
    }

    public function delete($id)
    {
        try{
            $campanha = Campanha::findOrFail($id);
            $campanha->delete();
            return response()->json('Sucesso');
        }catch(Exception $e) {
            return response()->json('Erro ao excluir registro');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $campanha = Campanha::findOrFail($id);
            $campanha->grupo_id = $request->input('grupo_id');
            $campanha->identificacao = $request->input('identificacao');
            $campanha->descricao = $request->input('descricao');

            $campanha->save();
            return response()->json('Sucesso');
        }catch(Exception $e) {
            return response()->json("Erro ao editar registro");
        }
    }

    public function setProdutoCampanha($idCampanha, $produtos)
    {
        try {
            foreach($produtos as $produto) {
                $campanha_produto = new CampanhaProduto();
                $campanha_produto->campanha_id = $idCampanha;
                $campanha_produto->produto_id = $produto['produto_id'];
                $campanha_produto->desconto_id = $produto['desconto_id'];

                $campanha_produto->save();
                return response()->json('Sucesso!');
            }
        }catch(Exception $e) {
            return response()->json($e->getMessage());
            return response()->json("Erro ao cadastrar produtos da campanha!");
        }
    }
}
