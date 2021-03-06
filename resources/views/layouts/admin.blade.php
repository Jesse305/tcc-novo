<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI - @yield('title')</title>

    <!-- icones e fontes -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('user.lista') }}" class="nav-link"> <i class="fa fa-home icone"></i> </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.lista') }}" class="brand-link">
      <img src="{{asset('img/logo.png')}}" alt="" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AI - Service</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fa fa-user text-light" style="font-size: 30px;"></i>
        </div>
        <div class="info">
          <a href="{{ route('user.cadastro', Auth::user()) }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link bg-info active">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Menu
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.lista') }}" class="nav-link active">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Usuários</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cliente.lista') }}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('veiculo.lista') }}" class="nav-link">
                  <i class="fa fa-car nav-icon"></i>
                  <p>Veículos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('orcamento.lista') }}" class="nav-link">
                  <i class="fa fa-check-square nav-icon"></i>
                  <p>Orçamentos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="{{ route('user.senha', Auth::user()) }}" class="nav-link"> <i class="nav-icon fa fa-key"></i>  <p>Alterar Senha</p> </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>Sair</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="container-fluid" style="padding: 10px;">
            @if(session('alerta'))
            <div class="col-md-10 mx-auto">
              <div class="alert alert-{{ session('alerta')['tipo'] }} text-center">
                <button type="button" class="close btn_refresh">&times;</button>
                <strong>{{ session('alerta')['texto'] }}</strong>
              </div>
            </div>
            @endif

            @yield('content')

        </div>

    </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="text-center"><strong>Copyright &copy; 2018 <a href="#">AI - Service</a>.</strong></div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<!-- jquery mask -->
<script src="{{ asset('js/jquery.mask.min.js') }}" charset="utf-8"></script>
<!-- app javascript -->
<script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
<!-- dataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" charset="utf-8"></script>
<!-- sweetalert2 -->
<script src="{{ asset('js/sweetalert2.all.js') }}" charset="utf-8"></script>
<!-- maskmoney -->
<script src="{{ asset('js/jquery.maskmoney.min.js') }}" charset="utf-8"></script>
@stack('scripts')
</body>
</html>
