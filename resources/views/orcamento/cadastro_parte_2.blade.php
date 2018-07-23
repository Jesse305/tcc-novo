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
          <th>Descrição do(s) Serviço(s)</th>
        </tr>
      </table>
      <form class="" action="{{ route('orcamento.cadastro_parte_3', $veiculo) }}" id="form_gerar_pdf" method="post">
        @csrf
        <table class="table table-bordered table-condensed">
          <thead>
            <th>Descrição</th>
            <th style="width: 180px;">Valor R$</th>
          </thead>
          <tbody id="itens">
            <tr>
              <td> <input class="form-control" type="text" name="item[0][descricao]" value="" required> </td>
              <td> <input class="form-control money valor" type="text" name="item[0][valor]" value="0,00" required style="width: 150px;" maxlength="10"> </td> </td>
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered table-condensed" style="margin-top: -15px;">
          <tr>
            <th class="text-right">Desconto:</th>
            <td style="width: 180px;"> <input class="form-control money" type="text" name="desconto" id="desconto" value="0,00" style="width: 150px;" maxlength="10"> </td>
          </tr>
          <tr>
            <th class="text-right">TOTAL:</th>
            <td> <input class="form-control money" type="text" name="total" id="total" value="0,00" required style="width: 150px;" readonly> </td>
          </tr>
        </table>
        <div class="text-right">
          <button type='button' class='btn btn-link' id="btn_remove"> <i class='fa fa-minus text-danger'></i> </button>
          <button type="button" class="btn btn-link" id="btn_add_item" title="Adicionar item" style="margin-right: 23px;"> <i class="fa fa-plus text-success"></i> </button>
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

  var i = 1;

function add_item()
{
  var tr =
  "<tr class='add'>" +
  "<td>" +
  "<input class='form-control' type='text' name='item["+i+"][descricao]' value='' required> </td>"+
  "</td>" +
  "<td>"+
  "<input class='form-control money valor' type='text' name='item["+i+"][valor]' value='0,00' onblur='calcula();' required style='width: 150px;' maxlength='10'>"+
  "</td>"+
  "</tr>";
  i++;
  return tr;
}

  btn_add_item.click(function(){
    itens.append(add_item());
    mask_money($('.money'));
  });

  var btn_remove = $('#btn_remove');
  btn_remove.click(function(){
    itens.find('.add').last().remove();
    calcula();
  });

  var form_gerar_pdf = $('#form_gerar_pdf');
  var desconto = $('#desconto');
  var total = $('#total');

  function calcula()
  {
    var t = 0;
    var x = $('.valor');

    for(var i = 0; i < x.length; i++){
      t += moedaParaNumero(x[i].value);
    }

    total.val(x[0].value);

    total_aux = t - moedaParaNumero(desconto.val());

    total.val(numeroParaMoeda(total_aux));

  }

  $('.money').on('blur', function(){
    calcula();
  });

  form_gerar_pdf.submit(function(){
    calcula();
    if(moedaParaNumero(total.val()) < 0){
      alert('Não é possível gerar orçamento com valor total negativo');
      return;
    }
  });
</script>
@endpush
