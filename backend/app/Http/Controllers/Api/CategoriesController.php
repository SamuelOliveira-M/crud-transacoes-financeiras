<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Categories; 
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();

        return response()->json([
            'status'=>true,
            'data'=>$categories,
            'message'=>'Deu certo 1'
        ],200);
            
    }

    public function store(Request $request)
    {
        // Validação do nome da categoria
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Criação da categoria
        $categoria = Categories::create([
            'nome' => $request->nome,
        ]);

        return response()->json(['message' => 'Categoria criada com sucesso!', 'categoria' => $categoria], 201);
    }

    public function update(Request $request, $id)
    {
        // Busca a categoria pelo ID
        $categoria = Categories::find($id);

        // Verifica se a categoria existe
        if (!$categoria) {
            return response()->json([
                'status' => false,
                'message' => 'Categoria não encontrada'
            ], 404);
        }

        // Validação do nome da categoria
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Atualiza o nome da categoria
        $categoria->update([
            'nome' => $request->nome,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Categoria atualizada com sucesso',
            'categoria' => $categoria
        ], 200);
    }

    public function destroy($id)
    {
        // Busca a categoria pelo ID
        $categoria = Categories::find($id);

        // Verifica se a categoria existe
        if (!$categoria) {
            return response()->json([
                'status' => false,
                'message' => 'Categoria não encontrada'
            ], 404);
        }

        // Exclui a categoria
        $categoria->delete();

        return response()->json([
            'status' => true,
            'message' => 'Categoria excluída com sucesso'
        ], 200);
    }

}

