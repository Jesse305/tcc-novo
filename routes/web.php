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

//Cliente
Route::get('/cliente/lista', 'ClienteController@lista')->name('cliente.lista');
Route::get('/cliente/cadastro', 'ClienteController@cadastro')->name('cliente.cadastro');
Route::post('/cliente/cadastrar', 'ClienteController@cadastrar')->name('cliente.cadastrar');
Route::get('/cliente/excluir/{cliente}', 'ClienteController@excluir')->name('cliente.excluir');
Route::get('/cliente/edicao/{cliente}', 'ClienteController@edicao')->name('cliente.edicao');
Route::post('/cliente/editar/{cliente}', 'ClienteController@editar')->name('cliente.editar');

Route::get('/veiculo/lista', 'VeiculoController@lista')->name('veiculo.lista');
Route::get('/veiculo/cadastro', 'VeiculoController@cadastro')->name('veiculo.cadastro');
Route::post('/veiculo/cadastrar', 'VeiculoController@cadastrar')->name('veiculo.cadastrar');
Route::get('/veiculo/edicao/{veiculo}', 'VeiculoController@edicao')->name('veiculo.edicao');
Route::post('/veiculo/editar/{veiculo}', 'VeiculoController@editar')->name('veiculo.editar');
Route::get('/veiculo/excluir/{veiculo}', 'VeiculoController@excluir')->name('veiculo.excluir');
