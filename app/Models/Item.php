<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // define as colunas que podem ser manipuladas na inserção e atualização no banco de dados
    protected $fillable = [
      'descricao', 'valor', 'orcamento_id'
    ];
}
