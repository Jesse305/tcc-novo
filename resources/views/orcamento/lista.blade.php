@extends('layouts.admin')

@section('title', 'ORÇAMENTOS')

@section('content')
<div class="col-md-10 mx-auto">
  <a href="{{ route('orcamento.cadastro_parte_1') }}" class="btn btn-info btn_novo"> <i class="fa fa-plus"></i> Novo Orçamento </a>
  <a href="{{ route('orcamento.lista')}}" class="btn btn-success btn_novo" title="Atualizar lista"> <i class="fa fa-refresh icone"></i> </a>
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title"> Orçamentos </h5>
    </div>
    <div class="card-body">
      <table class="table table-condensed table-hover dt_table">
        <thead>
          <tr>
            <th>Responsável</th>
            <th>Cliente</th>
            <th>Veículo</th>
            <th>Placa</th>
            <th>Data</th>
            <th style="width: 50px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orcamentos as $orcamento)
          <tr>
            <td>{{ $orcamento->getResponsavel->name }}</td>
            <td>{{ $orcamento->getVeiculo->getCliente->nome }}</td>
            <td>{{ $orcamento->getVeiculo->modelo }}</td>
            <td>{{ $orcamento->getVeiculo->placa }}</td>
            <td>{{ date('d/m/Y', strtotime($orcamento->created_at)) }}</td>
            <td> <a href="{{ route('orcamento.pdf', $orcamento) }}" target="_blank" class="btn btn-link" title="visualizar PDF"> <i class="fa fa-file text-info icone"></i> </a>  </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
