<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAIS | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    
<div class="login-box">
    <div class="flash-message">
        @if ($message = Session::get('error-message'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('success-message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/') }}/manager/index2.html" class="h1"><b>SAIS</b><span style="font-size: 20px">Management</span></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ url('/') }}/managers/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" class="btn btn-block btn-primary">
              <i class="fa fa-user mr-2"></i> Sign in
            </button>
          </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('/') }}/manager/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/manager/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/manager/dist/js/adminlte.min.js"></script>
</body>
</html>
