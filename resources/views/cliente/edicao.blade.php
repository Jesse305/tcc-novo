@extends('layouts.admin')

@section('title', 'CADASTRO CLIENTE')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">{{ $cliente->nome }}</h5>
    </div>
    <div class="card-body">
      <form class="" action="{{ route('cliente.editar', $cliente) }}" method="post">
        @include('cliente.form')
      </form>
    </div>
  </div>

  @if(count($cliente->getVeiculos) > 0)
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Veículos</h5>
    </div>
    <div class="card-header">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Veículo</th>
            <th>Placa</th>
            <th style="width: 50px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($cliente->getVeiculos as $veiculo)
          <tr>
            <td>{{ $veiculo->modelo }}</td>
            <td>{{ $veiculo->placa }}</td>
            <td> <a class="btn btn-link" href="{{ route('veiculo.edicao', $veiculo) }}" title="Visualizar cadastro"> <i class="fa fa-info-circle icone text-info"></i> </a> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
@endsection
