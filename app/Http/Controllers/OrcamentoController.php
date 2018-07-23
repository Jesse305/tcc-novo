<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Orcamento;
use App\Models\Item;
use Validator;
use Auth;

class OrcamentoController extends Controller
{
    public function __construct()
    {

      $this->middleware('auth');
    }

    public function lista()
    {

      return view('orcamento.lista', [
        'orcamentos' => Orcamento::all(),
      ]);
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

    private function moeda_to_decimal($moeda)
    {
      $moeda = str_replace('.', '', $moeda);
      $moeda = str_replace(',', '.', $moeda);

      return $moeda;
    }

    public function cadastro_parte_3(Veiculo $veiculo, Request $request)
    {
      $user = Auth::user();
      $itens = $request->item;

      $orcamento = new Orcamento([
        'user_id' => $user->id,
        'veiculo_id' => $veiculo->id,
        'desconto' => $this->moeda_to_decimal($request->desconto),
        'valor_total' => $this->moeda_to_decimal($request->valor_total),
      ]);

      if($orcamento->save()){

        for($i = 0; $i < count($itens); $i++){
          $new_item = new Item([
            'descricao' => $itens[$i]['descricao'],
            'valor' => $this->moeda_to_decimal($itens[$i]['valor']),
            'orcamento_id' => $orcamento->id,
          ]);
          $new_item->save();
        }

        return redirect()
        ->route('orcamento.lista')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Orçamento gerado com sucesso'
        ]);
      }

    }
}
