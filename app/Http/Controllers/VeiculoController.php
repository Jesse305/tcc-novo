<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Models\Cliente;
use Validator;

class VeiculoController extends Controller
{

    // acesso somente se autenticado
    public function __contruct()
    {
      $this->middleware('auth');
    }

    // retorna a tela de listagem de veiculos somente de clientes ativos
    public function lista()
    {

      $veiculos = Veiculo::join('clientes', 'clientes.id', 'veiculos.cliente_id')
      ->where('clientes.status', 1)
      ->get();

      return view('veiculo.lista', [
        'veiculos' => $veiculos,
      ]);
    }

    // lista os clientes ativos ordenados por nome para usar no select
    private function lista_clientes()
    {

      $lista_clientes = Cliente::where('status', 1)
      ->orderBy('nome')
      ->get();

      return $lista_clientes;
    }

    // retorna o ano atual + 1 para utilizar no select de ano
    private function ano()
    {

      $ano = date('Y');
      return $ano + 1;
    }

    // retorna a tela de cadastro
    public function cadastro()
    {

      return view('veiculo.cadastro', [
        'lista_clientes' => $this->lista_clientes(),
        'ano' => $this->ano(),
      ]);
    }

    // valida o formuário e insere o veículo no banco de dados
    public function cadastrar(Request $request)
    {

      $validacao = Validator::make($request->all(), [
        'cliente_id' => 'required|numeric',
        'modelo' => 'required|min:2',
        'fabricante' => 'required|min:3',
        'ano' => 'required|min:4',
        'placa' => 'required|min:8|unique:veiculos',
        'cor' => 'required|min:3',
      ]);

      $validacao->validate();

      $veiculo = new Veiculo($request->all());

      if($veiculo->save()){
        return redirect()
        ->route('veiculo.lista')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Cadastro realizado com sucesso!'
        ]);
      }
    }

    // retorna a tela de edição de cadastro de veículo
    public function edicao(Veiculo $veiculo)
    {

      return view('veiculo.edicao', [
        'veiculo' => $veiculo,
        'lista_clientes' => $this->lista_clientes(),
        'ano' => $this->ano(),
      ]);
    }

    // valida se placa já foi utilizada para em outro cadastro de veículo para edição
    private function valida_placa_edicao($veiculo_id, $veiculo_placa)
    {
      $count = Veiculo::where('id', '<>', $veiculo_id)
      ->where('placa', $veiculo_placa)
      ->count();

      return $count;
    }

    // valida formulário e edita cadastro de veículo
    public function editar(Veiculo $veiculo, Request $request)
    {

      $validacao = Validator::make($request->all(), [
        'cliente_id' => 'required|numeric',
        'modelo' => 'required|min:2',
        'fabricante' => 'required|min:3',
        'ano' => 'required|min:4',
        'placa' => 'required|min:8',
        'cor' => 'required|min:3',
      ]);

      if($this->valida_placa_edicao($veiculo->id, $request->placa)){
        $validacao->after(function($validacao){
          $validacao->errors()->add('placa', 'Placa já utilizada para cadastro de veículo');
        });
      }

      $validacao->validate();

      if($veiculo->update($request->all())){

        return redirect()
        ->route('veiculo.lista')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Cadastro editado com sucesso!'
        ]);
      }
    }

    // retorna os veículos por cliente no formato json para uso via ajax
    public function veiculos_por_cliente($cliente_id)
    {

      $veiculos = Veiculo::where('cliente_id', $cliente_id)
      ->get();

      return $veiculos->toJson();
    }
}
