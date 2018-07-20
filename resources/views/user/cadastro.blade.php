@extends('layouts.admin')
@section('title', 'CADASTRO')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">{{ $user->id != null ? $user->name : 'Cadastro Usuário' }}</h5>
    </div>
    <div class="card-body">
      @include('user.form')
    </div>
  </div>
</div>
@endsection
