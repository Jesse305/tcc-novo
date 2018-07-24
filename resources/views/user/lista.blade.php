@extends('layouts.admin')

@section('title', 'USUÁRIOS')

@section('content')

<div class="col-md-10 mx-auto">
  <a href="{{ route('user.cadastro') }}" class="btn btn-info btn_novo"> <i class="fa fa-plus"></i> Novo Usuário</a>
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Usuários</h5>
    </div>
    <div class="card-body">
      <table class="table table-condensed table-hover dt_table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>CPF</th>
            <th style="width: 50px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td> <a href="{{ route('user.cadastro', $user) }}"> {{ $user->name }} </a> </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->cpf }}</td>
            <td>
              @if($user->id != 1)
                @if($user->status == 1)
                <a href="{{ route('user.status', $user) }}" class="btn btn-link" title="Inativar"> <i class="fa fa-ban icone text-danger"></i> </a>
                @else
                <a href="{{ route('user.status', $user) }}" class="btn btn-link" title="Ativar"> <i class="fa fa-check icone text-success"></i> </a>
                @endif
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
