<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Validator;

class ClienteController extends Controller
{
    public function __construct()
    {

      $this->middleware('auth');
    }

    public function lista()
    {

      return view('cliente.lista', [
        'clientes' => Cliente::all(),
      ]);
    }

    public function cadastro()
    {

      return view('cliente.cadastro');
    }

    public function cadastrar(Request $request)
    {
      $validacao = Validator::make($request->all(), [
        'nome' => 'required|min:3',
        'cpf' => 'required|min:14|unique:clientes',
        'telefone' => 'required|min:14',
        'email' => 'email|unique:clientes',
      ]);

      $validacao->validate();

      $cliente = new Cliente($request->all());

      if($cliente->save()){
        return redirect()
        ->route('cliente.lista')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Cadastro inserido com sucesso!'
        ]);
      }

    }

    public function edicao(Cliente $cliente)
    {

      return view('cliente.edicao', [
        'cliente' => $cliente,
      ]);
    }

    private function cpf_existe($id, $cpf)
    {
      $count = Cliente::where('id', '<>', $id)
      ->where('cpf', $cpf)
      ->count();

      return $count;
    }

    public function editar(Cliente $cliente, Request $request)
    {

      $validacao = Validator::make($request->all(), [
        'nome' => 'required|min:3',
        'cpf' => 'required|min:14',
        'telefone' => 'required|min:14',
        'email' => 'email',
      ]);

      if($this->cpf_existe($cliente->id, $request->cpf)){
        $validacao->after(function($validacao){
          $validacao->errors()->add('cpf', 'CPF já utilizado para cadastro de cliente');
        });
      }

      $validacao->validate();

      if($cliente->update($request->all())){
        return redirect()
        ->route('cliente.lista')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Cadastro editado com sucesso!'
        ]);
      }
    }

    public function excluir(Cliente $cliente)
    {

      if($cliente->delete()){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Cadastro excluído com sucesso!',
        ]);
      }

      return redirect()
      ->back()
      ->with('alerta', [
        'tipo' => 'info',
        'texto' => 'Cadastro não pode ser excluído!',
      ]);
    }
}
