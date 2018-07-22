<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Veiculo;
use Validator;

class OrcamentoController extends Controller
{
    public function __construct()
    {

      $this->middleware('auth');
    }

    public function lista()
    {

      return view('orcamento.lista');
    }

    private function lista_clientes()
    {

      $lista_clientes = Cliente::orderBy('nome')
      ->get();

      return $lista_clientes;
    }

    public function cadastro_parte_1()
    {

      return view('orcamento.cadastro_parte_1', [
        'lista_clientes' => $this->lista_clientes(),
      ]);
    }

    public function cadastro_parte_2(Request $request)
    {

      $validacao = Validator::make($request->all(), [
        'cliente_id' => 'required|numeric',
        'veiculo_id' => 'required|numeric',
      ]);

      $validacao->validate();

      $veiculo = Veiculo::findOrFail($request->veiculo_id);

      return view('orcamento.cadastro_parte_2', [
        'veiculo' => $veiculo,
      ]);
    }
}
