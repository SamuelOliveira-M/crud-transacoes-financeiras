<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nome' => 'Alimentação'],
            ['nome' => 'Transporte'],
            ['nome' => 'Saúde'],
            ['nome' => 'Lazer'],
            ['nome' => 'Educação'],
        ]);
    }
}
