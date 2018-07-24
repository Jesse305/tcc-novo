@extends('layouts.admin')

@section('title', 'CLIENTES')

@section('content')
<div class="col-md-10 mx-auto">
  <a href="{{ route('cliente.cadastro') }}" class="btn btn-info btn_novo"> <i class="fa fa-plus"></i> Novo Cliente</a>
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Clientes</h5>
    </div>
    <div class="card-body">
      <table class="table table-condensed table-hover dt_table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th style="width: 50px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clientes as $cliente)
          <tr>
            <td> <a href="{{ route('cliente.edicao', $cliente) }}"> {{ $cliente->nome }} </a> </td>
            <td>{{ $cliente->cpf }}</td>
            <td>{{ $cliente->telefone }}</td>
            <td>{{ $cliente->email }}</td>
            <td>
              <a href="{{ route('cliente.status', $cliente) }}" class="btn btn-link">
                @if($cliente->status == 0)
                <i class="fa fa-check icone text-success" title="Ativar"></i>
                @else
                <i class="fa fa-ban icone text-danger" title="Inativar"></i>
                @endif
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
