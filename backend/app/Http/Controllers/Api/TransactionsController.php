<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Categories;

class TransactionsController extends Controller
{
    
    public function show($id) {
        // Tenta encontrar a transação pelo ID, ou retorna um erro 404 se não for encontrada
        $transaction = Transactions::with('categoria')->findOrFail($id);
    
        return response()->json([
            'status' => true,
            'data' => $transaction,
        ], 200);
    }
    
    public function index(){
        $transactions = Transactions::with('categoria')->get();

        return response()->json([
            'status'=>true,
            'data'=>$transactions,
        ],200);
            
    }

    public function destroy($id)
    {
        // Encontra a transação pelo ID
        $transaction = Transactions::find($id);

        // Verifica se a transação existe
        if (!$transaction) {
            return response()->json([
                'status' => false,
                'message' => 'Transação não encontrada'
            ], 404);
        }

        // Exclui a transação
        $transaction->delete();

        return response()->json([
            'status' => true,
            'message' => 'Transação excluída com sucesso'
        ], 200);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:receita,despesa',
            'valor' => 'required|numeric|min:0',
            'categoria_nome' => 'required|string|max:255',
        ]);

        $valor = $request->tipo === 'despesa' ? -abs($request->valor) : abs($request->valor);

        try{
            DB::beginTransaction();
            
            $categoria = Categories::firstOrCreate(['nome' => $request->categoria_nome]);

            // Criação da transação
            $transacao = Transactions::create([ // Use Transactions em vez de Transacao
                'tipo' => $request->tipo,
                'valor' => $valor,
                'categoria_id' => $categoria->id
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Transação criada com sucesso!',
                'transacao' => $transacao,
                'test'=> $categoria
            ], 201);

        }catch(\Exception $e){
            // Reverte todas as operações no banco de dados se ocorreu um erro
            DB::rollBack();

            return response()->json([
                'message' => 'Erro ao criar transação ou categoria.',
                'error' => $e->getMessage(),
            ], 500);
        }
        
    }

    public function update(Request $request, $id)
    {
        // Busca a transação pelo ID
        $transaction = Transactions::find($id);

        // Verifica se a transação existe
        if (!$transaction) {
            return response()->json([
                'status' => false,
                'message' => 'Transação não encontrada'
            ], 404);
        }

        $request->validate([
            'tipo' => 'required|in:receita,despesa',
            'valor' => 'required|numeric',
            'categoria_nome' => 'required|string|max:255',
        ]);

        $valor = $request->tipo === 'despesa' ? -abs($request->valor) : abs($request->valor);

        try{
            DB::beginTransaction();
            
            $categoria = Categories::firstOrCreate(['nome' => $request->categoria_nome]);

            $transaction->update([
                'tipo' => $request->tipo,
                'valor' => $valor,
                'categoria_id' => $categoria->id
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Transação criada com sucesso!',
                'transacao' => $transaction,  // Corrigido de $transacao para $transaction
                'categoria'=> $categoria
            ], 201);
            
        }catch(\Exception $e){
            // Reverte todas as operações no banco de dados se ocorreu um erro
            DB::rollBack();

            return response()->json([
                'message' => 'Erro ao criar transação ou categoria.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
