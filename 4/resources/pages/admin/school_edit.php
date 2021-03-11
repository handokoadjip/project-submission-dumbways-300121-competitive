<?php
session_start();
require '../../config/functions.php';

$page = 'school';

$email = $_SESSION['email'];
$user = query("SELECT * FROM user WHERE email = '$email' ")[0];

if (!$email) {
  header('Location: ../auth/login.php');
}


$id = $_GET['id'];
$school = query("SELECT * FROM school_tb WHERE id = $id")[0];

if ($user['id'] != $school['user_id']) {
  header('Location: school.php');
}

if (isset($_POST['submit'])) {
  $error = [];

  if (empty($_POST['NPSN'])) {
    $error['NPSN'] = 'NPSN tidak boleh kosong';
  }

  if (empty($_POST['name_school'])) {
    $error['name_school'] = 'Nama tidak boleh kosong';
  }

  if (empty($_POST['address'])) {
    $error['address'] = 'Alamat tidak boleh kosong';
  }

  if (empty($_POST['school_level'])) {
    $error['school_level'] = 'Level tidak boleh kosong';
  }

  if (!empty($_POST['NPSN']) && !empty($_POST['name_school']) && !empty($_POST['address']) && !empty($_POST['school_level'])) {
    if (update($_POST) > 0) {
      header("Location: school.php");
      $_SESSION["success"] = "Data berhasil diupdate";
    } else {
      echo mysqli_error($conn);
      die;
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>School - <?= $school['name_school']; ?></title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/fontawesome-free/css/all.min.css" />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />

  <!-- iCheck -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />

  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/jqvmap/jqvmap.min.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/dist/css/adminlte.min.css" />

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />

  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/daterangepicker/daterangepicker.css" />

  <!-- summernote -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/summernote/summernote-bs4.css" />

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

  <!-- DataTables -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" />

  <!-- Toastr -->
  <link rel="stylesheet" href="../../../public_html/vendors/adminlte/plugins/toastr/toastr.min.css" />

  <!-- MyCss -->
  <link rel="stylesheet" href="../../../public_html/vendors/pos/css/style.css" />

  <!-- jQuery -->
  <script src="../../../public_html/vendors/adminlte/plugins/jquery/jquery.min.js"></script>
</head>

<body class="sidebar-mini layout-fixed layout-footer-fixed accent-navy">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand accent-navy navbar-light navbar-white">
      <?php include("../components/admin/header.php"); ?>
    </nav>
    <!-- End-Navbar -->

    <!-- Main-Sidebar-Container -->
    <aside class="main-sidebar elevation-4 sidebar-light-success">
      <?= include("../components/admin/sidebar.php"); ?>
    </aside>
    <!-- End-Main-Sidebar-Container -->

    <!-- Content-Wrapper -->
    <div class="content-wrapper">
      <!-- Content-Header -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>School Add</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="school.php">School</a></li>
                <li class="breadcrumb-item active">Add</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- End-Content-Header -->

      <!-- Main-Content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-light pb-3">
                <!-- Card-Header -->
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <span class="ml-3">General Form</span>
                    </li>
                  </ul>
                </div>
                <!-- End-Card-Header -->

                <!-- Card-Body -->
                <div class="card-body box-profile">
                  <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="NPSN" class="col-sm-2 col-form-label">NPSN</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control b-left" id="NPSN" name="NPSN" placeholder="NPSN" value="<?= $school['NPSN']; ?>" />
                        <small class="text-danger pl-3"><?= isset($error['NPSN']) ? $error['NPSN'] : '';  ?></small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name_school" class="col-sm-2 col-form-label">School</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control b-left" id="name_school" name="name_school" placeholder="name_school" value="<?= $school['name_school']; ?>" />
                        <small class="text-danger pl-3"><?= isset($error['name_school']) ? $error['name_school'] : '';  ?></small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <textarea type="text" class="form-control b-left" id="address" name="address" placeholder="address"><?= $school['address']; ?></textarea>
                        <small class="text-danger pl-3"><?= isset($error['address']) ? $error['address'] : '';  ?></small>
                      </div>
                    </div>
                    <div class="form-group  row">
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-10">
                        <img src="../../../public_html/images/<?= $school['logo_school']; ?>" alt="logo" class="thumbnail" style="height: 100px; object-fit:cover;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="logo_school" class="col-sm-2 col-form-label">Logo School</label>
                      <div class="col-sm-10 mb-4">
                        <input type="file" class="form-control b-left h-100" id="logo_school" name="logo_school" placeholder="logo_school" />
                        <input type="hidden" name="logo_school_old" value="<?= $school['logo_school'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="school_level" class="col-sm-2 col-form-label">Level</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control b-left" id="school_level" name="school_level" placeholder="school_level" value="<?= $school['school_level']; ?>" />
                        <small class="text-danger pl-3"><?= isset($error['school_level']) ? $error['school_level'] : '';  ?></small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="status_school" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select class="form-control b-left" name="status_school">
                          <option value="active" <?= $school['status_school'] == 'active' ? 'selected' : null ?>>Active</option>
                          <option value="deactive" <?= $school['status_school'] == 'deactive' ? 'selected' : null ?>>Deactive</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-md-2 col-sm-10 mt-5">
                        <button type="submit" class="btn btn-block btn-primary" name="submit">
                          <i class="fab fa-telegram-plane mr-2"></i>Update
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- End-Card-Body -->
              </div>
              <!-- End-About-Me-->
            </div>
          </div>
      </section>
      <!-- End-Main-Content -->
    </div>
    <!-- End-Content-Wrapper -->

    <!-- Footer -->
    <footer class="main-footer text-sm">
      <div class="float-right d-none d-sm-block"><b>Version</b> 3.0.5</div>
      <strong>Copyright &copy; 2014-2019
        <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
    </footer>
    <!-- End-Footer -->

    <!-- Control-Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
    <!-- End-Control-Sidebar -->
  </div>

  <!-- jQuery UI 1.11.4 -->
  <script src="../../../public_html/vendors/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="../../../public_html/vendors/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- ChartJS -->
  <script src="../../../public_html/vendors/adminlte/plugins/chart.js/Chart.min.js"></script>

  <!-- Sparkline -->
  <script src="../../../public_html/vendors/adminlte/plugins/sparklines/sparkline.js"></script>

  <!-- JQVMap -->
  <script src="../../../public_html/vendors/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../public_html/vendors/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="../../../public_html/vendors/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- daterangepicker -->
  <script src="../../../public_html/vendors/adminlte/plugins/moment/moment.min.js"></script>
  <script src="../../../public_html/vendors/adminlte/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../public_html/vendors/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Summernote -->
  <script src="../../../public_html/vendors/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="../../../public_html/vendors/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <!-- AdminLTE App -->
  <script src="../../../public_html/vendors/adminlte/dist/js/adminlte.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="../../../public_html/vendors/adminlte/dist/js/demo.js"></script>

  <!-- DataTables -->
  <script src="../../../public_html/vendors/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../public_html/vendors/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../public_html/vendors/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../../public_html/vendors/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- Etc -->
  <script>
    $.widget.bridge("uibutton", $.ui.button);

    //-------------
    //- TOAST -
    //--------------
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: `Helloo.. how are you? If there are bugs can email to handokoadjipangestu@gmail.com`,
        title: 'Handoko Adji Pangestu',
        autohide: true,
        delay: 5000,
        class: 'bg-light',
        image: '../../../public_html/vendors/adminlte/dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
  </script>
</body>

</html>