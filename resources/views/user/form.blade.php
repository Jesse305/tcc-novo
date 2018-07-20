<form class="formulario" action="{{ route('user.inserir_atualizar_cadastro', $user) }}" method="post">
  @csrf
  <div class="form-group row">
    <label for="name" class="col-md-3 text-md-right col-form-label">Nome:</label>
    <div class="col-md-6">
      <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->id != null ? $user->name : '') }}"  maxlength="200" autofocus>
      @if($errors->has('name'))
        <span class="text-danger font-weight-bold">{{ $errors->first('name') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-md-3 text-md-right col-form-label">E-mail:</label>
    <div class="col-md-6">
      <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->id != null ? $user->email : '') }}"  maxlength="200">
      @if($errors->has('email'))
        <span class="text-danger font-weight-bold">{{ $errors->first('email') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row">
    <label for="cpf" class="col-md-3 text-md-right col-form-label">CPF:</label>
    <div class="col-md-6">
      <input class="form-control cpf" type="text" name="cpf" id="cpf" value="{{ old('cpf', $user->id != null ? $user->cpf : '') }}" >
      @if($errors->has('cpf'))
        <span class="text-danger font-weight-bold">{{ $errors->first('cpf') }}</span>
      @endif
    </div>
  </div>

  @if($user->id === null)
  <div class="form-group row">
    <label for="password" class="col-md-3 text-md-right col-form-label">Senha:</label>
    <div class="col-md-6">
      <input class="form-control" type="password" name="password" id="password" value=""  maxlength="18">
      @if($errors->has('password'))
        <span class="text-danger font-weight-bold">{{ $errors->first('password') }}</span>
      @endif
    </div>
  </div>
  @endif

  <div class="text-center">
    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
    <button type="button" class="btn btn-info btn-sm btn_voltar">Cancelar</button>
  </div>

</form>
