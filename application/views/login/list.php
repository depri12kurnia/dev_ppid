<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>
  <!-- icon -->
  <link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="<?php echo $this->website->icon(); ?>" alt="<?php echo $this->website->namaweb(); ?>" class="img img-responsive img-thumbnail" style="max-width: 30%; height: auto;">
        <br>
        <h2 style="font-weight: bold; font-size: 18px; margin-top: 20px;"><?php echo $this->website->namaweb() ?></h2>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php
        // Notifikasi error
        echo validation_errors('<p class="alert alert-warning">', '</p>');
        // Form open 
        echo form_open(base_url('login'));
        ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <div class="g-recaptcha" data-sitekey="6LcZN8sqAAAAAOtnUy-l0q7rYAp7t7viI-SDV_T-" data-callback="recaptchaCallback"></div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close(); ?>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/dist/js/adminlte.min.js"></script>
</body>

</html>