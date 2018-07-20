<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class UserController extends Controller
{

    public function __contruct()
    {
      $this->middleware('auth');
    }

    public function lista()
    {

      return view('user.lista', [
        'users' => User::all(),
      ]);
    }

    public function cadastro(User $user)
    {

      return view('user.cadastro', [
        'user' => $user,
      ]);
    }

    private function existe_cpf($id, $cpf)
    {
      $count = User::where('cpf', $cpf)
      ->where('id', '<>', $id)
      ->count();

      return $count;
    }

    private function existe_email($id, $email)
    {

      $count = User::where('email', $email)
      ->where('id', '<>', $id)
      ->count();

      return $count;
    }

    public function inserirAtualizarCadastro(User $user, Request $request)
    {

      if($user->id == null){

        $validacao = Validator::make($request->all(), [
          'name' => 'required|min:3',
          'email' => 'required|email|unique:users',
          'cpf' => 'required|min:14|unique:users',
          'password' => 'required|min:6'
        ]);

        $validacao->validate();

        $user = new User([
          'name' => $request->name,
          'email' => $request->email,
          'cpf' => $request->cpf,
          'password' => bcrypt($request->password),
        ]);

        if($user->save()){
          return redirect()
          ->route('user.lista')
          ->with('alerta', [
            'tipo' => 'success',
            'texto' => 'Cadastro realizado com sucesso!',
          ]);
        }

      }

      if($user->id != null){
        $validacao = Validator::make($request->all(), [
          'name' => 'required|min:3',
          'email' => 'required|email',
          'cpf' => 'required|min:14',
        ]);

        $existe_cpf = $this->existe_cpf($user->id, $request->cpf);
        $existe_email = $this->existe_email($user->id, $request->email);

        $validacao->after(function($validacao) use($existe_cpf, $existe_email) {
          if($existe_cpf){
            $validacao->errors()->add('cpf', 'CPF já utilizado para cadastro');
          }
          if($existe_email){
            $validacao->errors()->add('email', 'E-mail já utilizado para cadastro');
          }
        });

        $validacao->validate();

        if($user->update($request->all())){
          return redirect()
          ->route('user.lista')
          ->with('alerta', [
            'tipo' => 'success',
            'texto' => 'Cadastro alterado com sucesso!',
          ]);
        }
      }
    }

    public function excluir(User $user)
    {

      if($user->delete()){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Cadastro excluído com sucesso!'
        ]);
      }
    }

    public function senha(User $user)
    {

      if(Auth::user()->id != $user->id){
        return redirect()
        ->back();
      }

      return view('user.senha', [
        'user' => $user,
      ]);
    }

    public function alterar_senha(User $user, Request $request)
    {

      $validacao = Validator::make($request->all(), [
        'password' => 'required|min:6|confirmed'
      ]);

      $validacao->validate();

      if(Auth::user()->id === $user->id){
        if($user->update(['password' => bcrypt($request->password)])){
          return redirect()
          ->back()
          ->with('alerta', [
            'tipo' => 'success',
            'texto' => 'Senha alterada com sucesso'
          ]);
        }
      }
    }
}
