<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UB Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}} ">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}} ">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}} ">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}} ">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/favicon.ico">

  @laravelPWA

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href=""><i class="fas fa-bars"></i></a>
      </li>
      {{--  <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('dashboard') }}" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('fakultas') }}" class="nav-link"><i class="nav-icon fas fa-building"></i> Fakultas </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('jurusan') }}" class="nav-link"><i class="nav-icon fas fa-book"></i> Jurusan </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('ruangan') }}" class="nav-link"><i class="nav-icon fas fa-map-marker"></i> Ruangan </a>
      </li>  --}}

      <li class="navbar-item">
        <a class="nav-link" data-widget="pushmenu" href="" >Inventory Data Universitas Brawijaya   </a>
      </li>
    </ul>

    {{--  <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>  --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{--  headbar kanan  --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="">
                <i class="fas fa-user"></i>&nbsp;
                {{auth()->user()->name}}
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="" class="dropdown-item">
                <i class="fas fa-hashtag"></i> &nbsp;&nbsp; {{auth()->user()->role  }}
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ url('logout') }}" class="dropdown-item">
                <i class="fas fa-window-close"></i> &nbsp;&nbsp; Sign Out
              </a>
            </div>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;&nbsp; UB Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <div class="nav-header">Board</div>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

    @if(auth()->user()->role == "admin")
          <div class="nav-header" style="margin-left: -8px">Data</div>
          <li class="nav-item">
            <a href="{{ url('fakultas') }}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Fakultas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('jurusan') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Jurusan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('ruangan') }}" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
    @endif
          <li class="nav-item">
            <a href="{{ url('barang') }}" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Barang
              </p>
            </a>
          </li>

          <div class="nav-header" style="margin-left: -8px">Laporan</div>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Report
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('sendemail') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Send Email
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  @yield('content')




  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="#">UB Inventory</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>









  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}} "></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}} "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}} "></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}} "></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}} "></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}} "></script>
<!-- jQuery Knob Chart -->
<script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}} "></script>
<!-- daterangepicker -->
<script src="{{url('plugins/moment/moment.min.js')}} "></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}} "></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}} "></script>
<!-- Summernote -->
<script src="{{url('plugins/summernote/summernote-bs4.min.js')}} "></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}} "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}} "></script>
</body>
</html>
