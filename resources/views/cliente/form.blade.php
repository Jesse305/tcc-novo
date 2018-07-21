@csrf

<div class="form-group row">
  <label for="nome" class="col-md-3 text-md-right col-form-label">Nome:</label>
  <div class="col-md-7">
    <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome', isset($cliente) ? $cliente->nome : '') }}" autofocus required maxlength="240">
    @if($errors->has('nome'))
      <span class="text-danger font-weight-bold">{{ $errors->first('nome') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="cpf" class="col-md-3 text-md-right col-form-label">CPF:</label>
  <div class="col-md-7">
    <input class="form-control cpf" type="text" name="cpf" id="cpf" value="{{ old('cpf', isset($cliente) ? $cliente->cpf : '') }}" required style="width: 180px;">
    @if($errors->has('cpf'))
      <span class="text-danger font-weight-bold">{{ $errors->first('cpf') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="telefone" class="col-md-3 text-md-right col-form-label">Telefone:</label>
  <div class="col-md-7">
    <input class="form-control telefone" type="text" name="telefone" id="telefone" value="{{ old('telefone', isset($cliente) ? $cliente->telefone : '') }}" required style="width: 180px;">
    @if($errors->has('telefone'))
      <span class="text-danger font-weight-bold">{{ $errors->first('telefone') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="email" class="col-md-3 text-md-right col-form-label">E-mail:</label>
  <div class="col-md-7">
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email', isset($cliente) ? $cliente->email : '') }}">
    @if($errors->has('email'))
      <span class="text-danger font-weight-bold">{{ $errors->first('email') }}</span>
    @endif
  </div>
</div>

<div class="text-center">
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  <button type="button" class="btn btn-info btn-sm btn_voltar">Voltar</button>
</div>
