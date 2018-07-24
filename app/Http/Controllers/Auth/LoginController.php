<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
      return 'cpf';
    }

    public function login(Request $request)
    {

      $validacao = Validator::make($request->all(), [
        'cpf' => 'required',
        'password' => 'required',
      ]);

      $validacao->after(function($validacao) use($request) {
        if(Auth::attempt(['cpf' => $request->cpf, 'password' => $request->password, 'status' => 0])){
          Auth::logout();
          $validacao->errors()->add('cpf', 'Usuário inativado!');
        }

        if(!Auth::attempt(['cpf' => $request->cpf, 'password' => $request->password])){
          $validacao->errors()->add('cpf', 'Usuário ou senha incorretos!');
        }

      });

      $validacao->validate();

      if(Auth::attempt(['cpf' => $request->cpf, 'password' => $request->password, 'status' => 1])){
        return redirect()
        ->route('home');
      }
    }

}
