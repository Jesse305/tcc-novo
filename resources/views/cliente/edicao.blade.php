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
</div>
@endsection
