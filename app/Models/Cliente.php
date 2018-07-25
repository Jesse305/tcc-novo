<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // define as colunas que podem ser manipuladas na inserção e atualização no banco de dados
    protected $fillable = [
      'nome', 'cpf', 'telefone', 'email', 'status'
    ];

    // retorna todos veículos relacionados ao cliente pelo id do cliente
    public function getVeiculos()
    {

      return $this->hasMany(Veiculo::class, 'cliente_id', 'id');
    }
}
