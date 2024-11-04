<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'Categorias'; // Nome da tabela no banco de dados
    protected $fillable = ['nome'];
}
