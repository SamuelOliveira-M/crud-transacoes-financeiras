<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transactions extends Model
{
    use HasFactory;

    public $timestamps = false; // Se não deseja usar created_at e updated_at
    protected $table = 'Transacoes'; // Nome da tabela no banco de dados

    protected $fillable = [
        'tipo',
        'valor',
        'data',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categories::class, 'categoria_id'); // Referência ao modelo Categories
    }
}
