@csrf

<div class="form-group row">
  <label for="cliente_id" class="col-md-3 text-md-right col-form-label">Cliente:</label>
  <div class="col-md-7">
    <select class="form-control" name="cliente_id" id="cliente_id" autofocus required>
      <option value="">--Selecione--</option>
      @foreach($lista_clientes as $cliente)
      <option value="{{ $cliente->id }}" title="CPF: {{ $cliente->cpf }}"
        {{ (old('cliente_id') == $cliente->id || isset($veiculo) && $veiculo->cliente_id == $cliente->id ) ? 'selected' : ''}}
        > {{ $cliente->nome }} </option>
      @endforeach
    </select>
    @if($errors->has('cliente_id'))
    <span class="text-danger font-weight-bold">{{ $errors->first('cliente_id') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="modelo" class="col-md-3 text-md-right col-form-label">Modelo:</label>
  <div class="col-md-7">
    <input type="text" class="form-control" name="modelo" id="modelo" value="{{ old('modelo', isset($veiculo) ? $veiculo->modelo : '') }}" maxlength="100" required>
    @if($errors->has('modelo'))
    <span class="text-danger font-weight-bold">{{ $errors->first('modelo') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="fabricante" class="col-md-3 text-md-right col-form-label">Fabricante:</label>
  <div class="col-md-7">
    <input type="text" class="form-control" name="fabricante" id="fabricante" value="{{ old('fabricante', isset($veiculo) ? $veiculo->fabricante : '') }}" onkeyup="maiuscula(this);" maxlength="100" required>
    @if($errors->has('fabricante'))
    <span class="text-danger font-weight-bold">{{ $errors->first('fabricante') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="ano" class="col-md-3 text-md-right col-form-label">Ano:</label>
  <div class="col-md-7">
    <select class="form-control" name="ano" id="ano" required style="width: 150px;">
      <option value="">--Selecione--</option>
      @for($a = $ano; $a > 1969; $a--)
      <option value="{{ $a }}"
      {{ (old('ano') == $a || isset($veiculo) && $veiculo->ano == $a) ? 'selected' : '' }}
      > {{ $a }} </option>
      @endfor
    </select>
    @if($errors->has('ano'))
    <span class="text-danger font-weight-bold">{{ $errors->first('ano') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label for="placa" class="col-md-3 text-md-right col-form-label">Placa:</label>
  <div class="col-md-7">
    <input type="text" class="form-control placa" name="placa" id="placa" value="{{ old('placa', isset($veiculo) ? $veiculo->placa : '') }}" onkeyup="maiuscula(this);" style="width: 150px;">
    @if($errors->has('placa'))
    <span class="text-danger font-weight-bold">{{ $errors->first('placa') }}</span>
    @endif
  </div>
</div>

<div class="form-grou row" style="margin-bottom: 10px;">
  <label for="cor" class="col-md-3 text-md-right col-form-label">Cor:</label>
  <div class="col-md-7">
    <input type="text" class="form-control" name="cor" id="cor" value="{{ old('cor', isset($veiculo) ? $veiculo->cor : '') }}">
    @if($errors->has('cor'))
    <span class="text-danger font-weight-bold">{{ $errors->first('cor') }}</span>
    @endif
  </div>
</div>

<div class="text-center">
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  <button type="button" class="btn btn-info btn-sm btn_voltar">Voltar</button>
</div>
