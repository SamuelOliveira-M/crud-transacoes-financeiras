<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transacoes')->insert([
            [
                'tipo' => 'receita',
                'valor' => 1500.00,
                'descricao' => 'Salário',
                'data' => now()->toDateString(),
                'categoria_id' => 1, // Referência à categoria 'Alimentação'
            ],
            [
                'tipo' => 'despesa',
                'valor' => -200.00,
                'descricao' => 'Compra de supermercado',
                'data' => now()->toDateString(),
                'categoria_id' => 1,
            ],
            [
                'tipo' => 'despesa',
                'valor' => -50.00,
                'descricao' => 'Transporte público',
                'data' => now()->toDateString(),
                'categoria_id' => 2,
            ],
            [
                'tipo' => 'receita',
                'valor' => 300.00,
                'descricao' => 'Venda de produtos',
                'data' => now()->toDateString(),
                'categoria_id' => 3,
            ],
        ]);
    }
}
