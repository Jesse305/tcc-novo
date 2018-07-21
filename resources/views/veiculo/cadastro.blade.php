@extends('layouts.admin')

@section('title', 'CADATRO DE VEÍCULO')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Cadastro de Veículo</h5>
    </div>
    <div class="card-body">
      <form class="" action="{{ route('veiculo.cadastrar') }}" method="post">
        @include('veiculo.form')
      </form>
    </div>
  </div>
</div>
@endsection
