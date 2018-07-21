@extends('layouts.admin')

@section('title', 'VEÍCULOS')

@section('content')
<div class="col-md-10 mx-auto">
  <a href="{{ route('veiculo.cadastro') }}" class="btn btn-info btn_novo"> <i class="fa fa-plus"></i> Novo Veículo </a>
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Veículos</h5>
    </div>
    <div class="card-body">
      <table class="table table-condensed table-hover dt_table">
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Cor</th>
            <th style="width: 50px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($veiculos as $veiculo)
          <tr>
            <td> <a href="{{ route('cliente.edicao', $veiculo->getCliente->id) }}"> {{ $veiculo->getCliente->nome }} </a> </td>
            <td> <a href="{{ route('veiculo.edicao', $veiculo) }}"> {{ $veiculo->modelo }} </a> </td>
            <td> {{ $veiculo->placa }} </td>
            <td> {{ $veiculo->cor }} </td>
            <td> <button type="button" class="btn btn-link btn_excluir" data-href="{{ route('veiculo.excluir', $veiculo) }}" title="Excluir cadastro"> <i class="fa fa-trash text-danger icone"></i> </button> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
