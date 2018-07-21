@extends('layouts.admin')

@section('title', 'GERAR ORÇAMENTO')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Gerar Orçamento</h5>
    </div>
    <div class="card-body">
      <form class="" action="" method="post">

        <div class="form-group row">
          <label for="cliente_id" class="col-md-3 col-form-label text-md-right">Cliente:</label>
          <div class="col-md-7">
            <select class="form-control" name="cliente_id" id="cliente_id" required autofocus>
              <option value="">--Selecione--</option>
              @foreach($lista_clientes as $cliente)
              <option value="{{ $cliente->id }}" title="CPF: {{ $cliente->cpf }}" >{{ $cliente->nome }}</option>
              @endforeach
            </select>
            @if($errors->has('cliente_id'))
            <span class="text-danger font-weight-bold">{{ $errors->first('cliente_id') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="veiculo_id" class="col-md-3 col-form-label text-md-right">Veículo:</label>
          <div class="col-md-7">
            <select class="form-control" name="veiculo_id" id="veiculo_id" title="Selecione o Cliente" required>
              <option value="">--Selecione--</option>
            </select>
            @if($errors->has('veiculo_id'))
            <span class="text-danger font-weight-bold">{{ $errors->first('veiculo_id') }}</span>
            @endif
          </div>
        </div>

        <div class=" col-md-10 text-right">
          <button type="button" class="btn btn-info btn-sm btn_voltar">Voltar</button>
          <button type="submit" class="btn btn-success btn-sm">Continuar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  var cliente_id = $('#cliente_id');
  var veiculo_id = $('#veiculo_id');

  cliente_id.on('change', function(){
    populate_select_veiculo($(this).val());
  });

  function populate_select_veiculo(clienteid)
  {
    if(clienteid != ''){
      $.ajax({
        type: 'get',
        dataType: 'json',
        url: "/veiculo/por_cliente/json/"+clienteid,
        beforeSend: function(){
          reset_select_veiculo();
        },
        success: function(data){
          $.each(data, function(i, d){
            veiculo_id.append('<option value="' + d.id + '">' + d.modelo + '</option>');
          });
        }
      });
    }
    reset_select_veiculo();
  }

  function reset_select_veiculo()
  {
    veiculo_id.find('option').remove();
    veiculo_id.append('<option value="">--Selecione--</option>');
  }
</script>
@endpush
