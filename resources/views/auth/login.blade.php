<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TCC - LOGIN</title>

  <!-- styles -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-light">
    <a class="navbar-brand text-info" href="/">Logo da Empresa</a>
  </nav>

  <div class="container-fluid" style="margin-top: 150px;">
    <div class="col-md-4 mx-auto">
      <div class="card shadow">
        <div class="card-header bg-info text-light">
          <h5 class="card-title">Login</h5>
        </div>
        <div class="card-body">
          <form class="" action="" method="post">
            @csrf
            <div class="form-group row">
              <label for="cpf" class="col-md-4 col-form-label text-md-right">Usuário:</label>
              <div class="col-md-6">
                <input class="form-control cpf" type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required autofocus>
                @if($errors->has('cpf'))
                  <span class="text-danger font-weight-bold"> {{ $errors->first('cpf') }} </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>
              <div class="col-md-6">
                <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" required maxlength="18">
                @if($errors->has('password'))
                  <span class="text-danger font-weight-bold"> {{ $errors->first('password') }} </span>
                @endif
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-info btn-sm">Entrar</button> <br>
              <a href="#" class="btn btn-link">Recuperar senha</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

</body>
</html>
