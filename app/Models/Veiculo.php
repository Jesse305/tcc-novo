<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    // define as colunas que podem ser manipuladas na inserção e atualização no banco de dados
    protected $fillable = [
      'modelo', 'fabricante', 'ano', 'placa', 'cor', 'cliente_id'
    ];

    // retorna o cliente dono do veículo
    public function getCliente()
    {

      return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
