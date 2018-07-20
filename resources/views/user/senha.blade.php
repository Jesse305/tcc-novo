@extends('layouts.admin')

@section('title', 'ALTERAR SENHA')

@section('content')
<div class="col-md-5 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h5 class="card-title">Alterar Senha</h5>
    </div>
    <div class="card-body">
      <form class="" action="{{ route('user.alterar_senha', $user) }}" method="post">
        @csrf

        <div class="form-group row">
          <label for="password" class="col-md-3 text-md-right col-form-label">Nova Senha:</label>
          <div class="col-md-7">
            <input class="form-control" type="password" name="password" id="password" value="" maxlength="18" required>
            @if($errors->has('password'))
            <span class="text-danger font-weight-bold"> {{ $errors->first('password') }} </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="password_confirmation" class="col-md-3 text-md-right col-form-label">Confirmação:</label>
          <div class="col-md-7">
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" maxlength="18" required placeholder="Digite novamente a nova senha">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success btn-sm">Salvar</button>
          <button type="button" class="btn btn-info btn-sm btn_voltar">Voltar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
