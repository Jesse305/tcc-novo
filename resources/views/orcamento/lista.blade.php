@extends('layouts.admin')

@section('title', 'ORÇAMENTOS')

@section('content')
<div class="col-md-10 mx-auto">
  <a href="{{ route('orcamento.cadastro_parte_1') }}" class="btn btn-info btn_novo"> <i class="fa fa-plus"></i> Novo Orçamento </a>
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title"> Orçamentos </h5>
    </div>
    <div class="card-body">

    </div>
  </div>
</div>
@endsection
