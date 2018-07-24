<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Orcamento extends Model
{
    protected $fillable = [
      'user_id', 'veiculo_id', 'desconto', 'valor_total'
    ];

    public function getResponsavel()
    {

      return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getVeiculo()
    {

      return $this->hasOne(Veiculo::class, 'id', 'veiculo_id');
    }

    public function getItens()
    {

      return $this->hasMany(Item::class, 'orcamento_id', 'id');
    }
}
