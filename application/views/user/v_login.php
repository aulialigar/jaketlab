<br>
<br>
<br>
  

  <head>
  <title>Jaket Lab</title>
  <link rel="shortcut icon" href="favicon.ico">

  <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/animate.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/icomoon.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/flexslider.css">
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

  <div class="container" align="center">
  <div class="col-md-4 col-md-offset-4"><br>
    <div class="login-logo">
      <b style="color:#1abc9c;">Login</b>
    </div>

    <div>
      <p class="login-box-msg">login untuk dapat memesan</p>

      <form action="<?= base_url('index.php/user/login') ;?>" method="POST">
        <?php if (!empty($notif)) { ?>
          <div class="alert alert-danger"><?= $notif; ?></div>
        <?php } ?>
        <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-user form-control-feedback pull-left"></span>
          <input type="text" name="nim" class="form-control" placeholder="NIM">

        </div>
        <div class="form-group has-feedback">
            <span class="glyphicon glyphicon-lock form-control-feedback pull-left"></span>
          <input type="password" name="pass" class="form-control" placeholder="Password">
        </div>
        <div class="row">

          <div class="col-md-12 pull-right">
            <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Login">
          </div>
       </form>
          <br><br>
        </div>

        <p>Belum punya akun? <a href="<?= base_url('index.php/user/daftar') ?>">Daftar</a></p>
    </div>

  </div>
  </div>

<br>
<br>