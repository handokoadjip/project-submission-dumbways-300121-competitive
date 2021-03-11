<?php

session_start();
require '../../config/functions.php';

if (isset($_POST['submit'])) {
  $error = [];

  if (empty($_POST['name'])) {
    $error['name'] = 'Nama tidak boleh kosong';
  }
  if (empty($_POST['email'])) {
    $error['email'] = 'Email tidak boleh kosong';
  }
  if (empty($_POST['password'])) {
    $error['password'] = 'Passowrd tidak boleh kosong';
  }
  if (empty($_POST['retype_password'])) {
    $error['retype_password'] = 'Ulangi Passowrd tidak boleh kosong';
  }

  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['retype_password'])) {
    if (regis($_POST) > 0) {
      $_SESSION['success'] = "Registrasi berhasil, silakan login";
      header('Location: ../auth/login.php');
    } else {
      echo mysqli_error($conn);
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School - Auth: Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- MyCss -->
  <link rel="stylesheet" href="../../../public_html/vendors/pos/css/style.css" />
  <link rel="stylesheet" href="../../../public_html/css/utility.css" />
  <link rel="stylesheet" href="../../../public_html/css/style.css" />

  <!-- jQuery -->
  <script src="../../../public_html/vendors/adminlte/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition register-page" style="background-color: white;">
  <!-- Register-Box -->
  <div class="register-box">
    <div class="card shadows">
      <div class="card-body register-card-body">
        <h1 class="text-center m-0 title">School</h1>
        <p class="login-box-msg">Register a new membership</p>
        <?php if (isset($_SESSION['danger'])) : ?>
          <div class="alert alert-danger">
            <?php echo $_SESSION['danger']; ?>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['danger']); ?>

        <form action="" method="post">
          <div class="input-group mt-1 b-left">
            <input type="text" class="form-control" name="name" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <small class="text-danger pl-3"><?= isset($error['name']) ? $error['name'] : '';  ?></small>
          <div class="input-group mt-1 b-left">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <small class="text-danger pl-3"><?= isset($error['email']) ? $error['email'] : '';  ?></small>
          <div class="input-group mt-1 b-left">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small class="text-danger pl-3"><?= isset($error['password']) ? $error['password'] : '';  ?></small>
          <div class="input-group mt-1 b-left">
            <input type="password" class="form-control" name="retype_password" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small class="text-danger pl-3"><?= isset($error['retype_password']) ? $error['retype_password'] : '';  ?></small>
          <div class="row mt-3">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-lg btn-success btn-block" name="submit">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-0 text-center mt-5">
          <a href="login.php" class="text-muted">I have alredy membership</a>
        </p>
      </div>
    </div>
  </div>
  <!-- End-Register-Box -->

  <!-- Bootstrap 4 -->
  <script src="../../../public_html/vendors/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="../../../public_html/vendors/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>