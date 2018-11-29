<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Orcamento;
use App\Models\Item;
use Validator;
use Auth;
use PDF;

class OrcamentoController extends Controller
{
    // acesso somente se autenticado
    public function __construct()
    {

      $this->middleware('auth');
    }

    // função que lista os orçamentos. lista todos ou o último inserido
    public function lista(Orcamento $orcamento)
    {
      $orcamentos = Orcamento::all();

      if($orcamento->id){
        $orcamentos = Orcamento::where('id', $orcamento->id)
        ->get();
      }

      return view('orcamento.lista', [
        'orcamentos' => $orcamentos,
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

    // retorna a primeira tela de cadastro de orçamento
    public function cadastro_parte_1()
    {

      return view('orcamento.cadastro_parte_1', [
        'lista_clientes' => $this->lista_clientes(),
      ]);
    }

    // valida o formulário de cadastro 1, se ok, retorna a tela de cadastro 2
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

    // formata numero do tipo moeda para decimal para inserir no banco
    private function moeda_to_decimal($moeda)
    {
      $moeda = str_replace('.', '', $moeda);
      $moeda = str_replace(',', '.', $moeda);

      return $moeda;
    }

    // insere o orçamento e os itens do orçamento no banco de dados
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
        ->route('orcamento.lista', $orcamento->id)
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Orçamento gerado com sucesso'
        ]);
      }

    }

    // gera o pdf do orçamento
    public function pdf(Orcamento $orcamento)
    {
      $data = [
        'orcamento' => $orcamento,
      ];

      $pdf = PDF::loadView('orcamento.pdf', $data);

      return $pdf->stream('orcamento.pdf');
    }

    //altera o status do orçamento entre válidado e inválidado
    public function status(Orcamento $orcamento)
    {

      $novo_status = 1;
      if($orcamento->validado == 1){
        $novo_status = 0;
      }

      $msg = ($novo_status == 1 ? " Validado " : " Inválidado ");

      if($orcamento->update(['validado' => $novo_status])){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Orçamento ' . $msg . ' com sucesso',
        ]);
      }
    }
}
