<?php

session_start();
require '../../config/functions.php';

if (isset($_POST['submit'])) {
  $error = [];

  if (empty($_POST['email'])) {
    $error['email'] = 'Email tidak boleh kosong';
  }

  if (empty($_POST['password'])) {
    $error['password'] = 'Password tidak boleh kosong';
  }

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if (login($_POST) > 0) {
      header('Location: ../admin/dashboard.php');
    } else {
      echo mysqli_error($conn);
    }
  }
}

if (isset($_SESSION['email'])) {
  header('Location: ../admin/dashboard.php');
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>School - Auth: Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/fontawesome-free/css/all.min.css" />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/dist/css/adminlte.min.css" />

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

  <!-- MyCss -->
  <link rel="stylesheet" href="../../../public_html/vendors/pos/css/style.css" />
  <link rel="stylesheet" href="../../../public_html/css/utility.css" />
  <link rel="stylesheet" href="../../../public_html/css/style.css" />

  <!-- jQuery -->
  <script src="../../../public_html/vendors/adminlte/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition login-page" style="background-color: white;">
  <!-- Login-Box -->
  <div class="login-box">
    <div class="card shadows">
      <!-- Card-Body -->
      <div class="card-body login-card-body">
        <h1 class="text-center m-0 title">School</h1>
        <p class="login-box-msg">Sign in to start your session</p>

        <?php if (isset($_SESSION['success'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['success']); ?>

        <?php if (isset($_SESSION['danger'])) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['danger']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['danger']); ?>

        <form action="" method="post">
          <div class="input-group mt-1">
            <input type="email" class="form-control b-left" name="email" placeholder="Email" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <small class="text-danger pl-3"><?= isset($error['email']) ? $error['email'] : '';  ?></small>
          <div class="input-group mt-1">
            <input type="password" class="form-control b-left" name="password" placeholder="Password" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small class="text-danger pl-3"><?= isset($error['password']) ? $error['password'] : '';  ?></small>
          <div class="row  mt-3">
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block" name="submit">
                Sign In
              </button>
            </div>
            <div class="col-8">
              <p class="mb-0 text-right">
                <a href="<?= $base_url; ?>/index.php" class="text-muted"><small>Back to hompage</small></a>
              </p>
            </div>
          </div>
        </form>

        <p class="mb-0 text-center mt-5">
          <a href="register.php" class="text-muted">Register a new membership</a>
        </p>

      </div>
      <!-- End-Card-Body -->
    </div>
  </div>
  <!-- End-Login-Box -->

  <!-- Bootstrap 4 -->
  <script src="../../../public_html/vendors/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="../../../public_html/vendors/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>