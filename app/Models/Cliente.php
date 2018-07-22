<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
      'nome', 'cpf', 'telefone', 'email'
    ];

    public function getVeiculos()
    {
      
      return $this->hasMany(Veiculo::class, 'cliente_id', 'id');
    }
}
