<!DOCTYPE html>
<html>
<head>
  <title>Jaket Lab</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

  <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/icomoon.css">
  <!-- Simple Line Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/simple-line-icons.css">
  <!-- Datetimepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/bootstrap-datetimepicker.min.css">
  <!-- Flexslider -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/flexslider.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/bootstrap.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/style.css">
    <style>
    .vertical-center {
      min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
      min-height: 100vh; /* These two lines are counted as one :-)       */

      display: flex;
      align-items: center;
    }
  </style>

</head>
<body class="vertical-center">
  <div align="center" style="margin: 0px auto;">
  <div class="login-logo">
    <b style="color:#1abc9c;">Admin Login</b>
  </div>

  <div >
    <p class="login-box-msg">login untuk masuk ke halaman admin</p>

    <form action="<?= base_url('index.php/admin/login') ?>" method="POST">
      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-user form-control-feedback pull-left"></span>
        <input type="text" name="username" class="form-control" placeholder="Username">

      </div>
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-lock form-control-feedback pull-left"></span>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="row">

        <div class="col-md-12 pull-right">
          <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Login">
        </div>
     </form>
        <br><br>
      </div>
  </div>
</body>
</html>