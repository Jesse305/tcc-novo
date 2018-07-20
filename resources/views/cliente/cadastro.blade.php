@extends('layouts.admin')

@section('title', 'CADASTRO CLIENTE')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Cadastro de Cliente</h5>
    </div>
    <div class="card-body">
      <form class="" action="{{ route('cliente.cadastrar') }}" method="post">
        @include('cliente.form')
      </form>
    </div>
  </div>
</div>
@endsection
