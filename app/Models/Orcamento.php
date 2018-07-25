<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Orcamento extends Model
{
    // define as colunas que podem ser manipuladas na inserção e atualização no banco de dados
    protected $fillable = [
      'user_id', 'veiculo_id', 'desconto', 'valor_total'
    ];

    // retorna o responsável pelo orçamento
    public function getResponsavel()
    {

      return $this->hasOne(User::class, 'id', 'user_id');
    }

    // retorna o veículo do orçamento
    public function getVeiculo()
    {

      return $this->hasOne(Veiculo::class, 'id', 'veiculo_id');
    }

    // retorna os itens do orçamento
    public function getItens()
    {

      return $this->hasMany(Item::class, 'orcamento_id', 'id');
    }
}
