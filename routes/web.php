<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User
Route::get('/user/cadastro/{user?}', 'UserController@cadastro')->name('user.cadastro');
Route::post('/user/inserir_atualizar_cadastro/{user?}', 'UserController@inserirAtualizarCadastro')->name('user.inserir_atualizar_cadastro');
Route::get('/user/lista', 'UserController@lista')->name('user.lista');
Route::get('/user/excluir/{user}', 'UserController@excluir')->name('user.excluir');
Route::get('/user/senha/{user}', 'UserController@senha')->name('user.senha');
Route::post('/user/alterar_senha/{user}', 'UserController@alterar_senha')->name('user.alterar_senha');
