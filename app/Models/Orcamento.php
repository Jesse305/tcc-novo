<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
      'user_id', 'veiculo_id', 'desconto', 'valor_total'
    ];
}
