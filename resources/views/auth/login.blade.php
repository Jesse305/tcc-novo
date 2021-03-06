<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AI - LOGIN</title>

  <!-- styles -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-light">
    <a class="navbar-brand text-info" href="/"> <img src="{{ asset('img/logo.png') }}" alt="" style="width: 50px;"> AI - Service</a>
  </nav>

  <div class="container-fluid" style="margin-top: 150px;">
    <div class="col-md-4 mx-auto">
      <div class="card shadow">
        <div class="card-header bg-info text-light">
          <h5 class="card-title">Login</h5>
        </div>
        <div class="card-body">
          <form class="" action="{{ route('login') }}" method="post">
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
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-info btn-sm">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-sm bg-light fixed-bottom">
    <div class="col-md-3 mx-auto"><strong>Copyright &copy; 2018 <a href="#">AI - Service</a>.</strong></div>
  </nav>

  <!-- scripts -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

</body>
</html>
