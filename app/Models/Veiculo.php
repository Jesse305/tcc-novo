<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
      'modelo', 'fabricante', 'ano', 'placa', 'cor', 'cliente_id'
    ];

    public function getCliente()
    {

      return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
