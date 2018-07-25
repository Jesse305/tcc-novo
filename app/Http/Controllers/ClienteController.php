<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Validator;

class ClienteController extends Controller
{
    // acesso somente se autenticado
    public function __construct()
    {

      $this->middleware('auth');
    }

    // retorna a tela com a lista de clientes
    public function lista()
    {

      return view('cliente.lista', [
        'clientes' => Cliente::all(),
      ]);
    }

    // retorna a tela de cadastro de cliente
    public function cadastro()
    {

      return view('cliente.cadastro');
    }

    // valida o formulário e insere cliente
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

    // retorna a tela de edição de cadastro de cliente
    public function edicao(Cliente $cliente)
    {

      return view('cliente.edicao', [
        'cliente' => $cliente,
      ]);
    }

    // verifica se o cpf já foi utilizado em outro cadastro
    private function cpf_existe($id, $cpf)
    {
      $count = Cliente::where('id', '<>', $id)
      ->where('cpf', $cpf)
      ->count();

      return $count;
    }

    // valida formulário e edita cadastro de cliente
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

    //altera o status do cliente entre ativo e inativo
    public function status(Cliente $cliente)
    {
      $status = 0;

      if($cliente->status == 0){
        $status = 1;
      }

      if($cliente->update(['status' => $status])){

        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Status alterado com sucesso',
        ]);
      }
    }
}
