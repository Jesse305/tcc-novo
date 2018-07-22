@extends('layouts.admin')

@section('title', 'GERAR ORÇAMENTO')

@section('content')
<style media="screen">
  .table {
    margin-bottom: 15px !important;
  }
</style>
<div class="col-md-10 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Gerar Orçamento</h5>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-condensed">
        <tr>
          <td> <b>Responsável:</b> {{ Auth::user()->name }} </td>
          <td class="text-right"> <b>Data:</b> {{ date('d/m/Y') }} </td>
        </tr>
      </table>

      <table class="table table-bordered table-condensed">
        <tr>
          <th colspan="4" class="text-center bg-light"> Dados do Cliente </th>
        </tr>
        <tr>
          <td> <b>Nome:</b> {{ $veiculo->getCliente->nome }} </td>
          <td> <b>CPF:</b> {{ $veiculo->getCliente->cpf }} </td>
          <td> <b>Telefone:</b> {{ $veiculo->getCliente->telefone }} </td>
          <td> <b>E-mail:</b> {{ $veiculo->getCliente->email }} </td>
        </tr>
      </table>

      <table class="table table-bordered table-condensed">
        <tr>
          <th colspan="3" class="text-center bg-light"> Dados do Veículo </th>
        </tr>
        <tr>
          <td> <b>Modelo:</b> {{ $veiculo->modelo }} </td>
          <td> <b>Fabricante:</b> {{ $veiculo->fabricante }} </td>
          <td> <b>Ano:</b> {{ $veiculo->ano }} </td>
        </tr>
        <tr>
          <td> <b>Placa:</b> {{ $veiculo->placa }} </td>
          <td colspan="2"> <b>Cor:</b> {{ $veiculo->cor }} </td>
        </tr>
      </table>

      <table class="table table-bordered table-condensed" style="margin-bottom: 0px !important;">
        <tr class="text-center bg-light">
          <th>Descrição do Serviço</th>
        </tr>
      </table>
      <form class="" action="" method="post">
        <table class="table table-bordered table-condensed">
          <thead>
            <th style="width: 70px;">QTD.</th>
            <th>Descrição</th>
            <th style="width: 180px;">Valor R$</th>
          </thead>
          <tbody id="itens">
            <tr>
              <td> <input class="form-control" type="number" name="item[qtd][]" value="" required style="width: 60px;"> </td>
              <td> <input class="form-control" type="text" name="item[descricao][]" value="" required> </td>
              <td> <input class="form-control money" type="text" name="item[valor][]" value="" required style="width: 150px;" maxlength="10"> </td> </td>
            </tr>
          </tbody>
        </table>
        <div class="text-right">
          <button type='button' class='btn btn-danger btn-sm' id="btn_remove"> <i class='fa fa-minus'></i> </button>
          <button type="button" class="btn btn-success btn-sm" id="btn_add_item" title="Adicionar item" style="margin-right: 23px;"> <i class="fa fa-plus"></i> </button>
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-info btn-sm btn_voltar">Voltar</button>
          <button type="submit" class="btn btn-success btn-sm">Gerar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  var btn_add_item = $('#btn_add_item');
  var itens = $('#itens');

  var tr =
  "<tr class='add'>" +
  "<td>" +
  "<input class='form-control' type='number' name='item[qtd][]' value='' required style='width: 60px;'>"+
  "</td>" +
  "<td>" +
  "<input class='form-control' type='text' name='item[descricao][]' value='' required> </td>"+
  "</td>" +
  "<td>"+
  "<input class='form-control money' type='text' name='item[valor][]' value='' required style='width: 150px;' maxlength='10'>"+
  "</td>"+
  "</tr>";

  btn_add_item.click(function(){
    itens.append(tr);
    mask_money($('.money'));
  });

  var btn_remove = $('#btn_remove');
  btn_remove.click(function(){
    itens.find('.add').last().remove();
  });
</script>
@endpush
