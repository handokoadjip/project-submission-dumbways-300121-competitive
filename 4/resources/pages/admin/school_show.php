<?php
session_start();
require '../../config/functions.php';

$page = 'school';

$email = $_SESSION['email'];
$user = query("SELECT * FROM user WHERE email = '$email' ")[0];

if (!$email) {
  header('Location: ../auth/login.php');
}

$id = $_GET["id"];
$school = query("SELECT * FROM school_tb JOIN user ON `school_tb`.`user_id` = `user`.`id` WHERE `school_tb`.`id` = $id")[0];

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
              <h1>School Detail</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="school.php">School</a></li>
                <li class="breadcrumb-item active">Detail</li>
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
            <?php if (isset($school)) : ?>
              <div class="col-md-3">
                <!-- Profile-Image -->
                <div class="card card-light card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="../../../public_html/vendors/pos/img/default.jpg" alt="User profile picture" />
                    </div>

                    <h3 class="profile-username text-center">
                      <?= $school['name']; ?>
                    </h3>
                    <center>
                      <small class="text-muted text-center"><?= $school['email']; ?></small>
                    </center>
                  </div>
                </div>
                <!-- End-Profile-Image -->

                <!-- About-Me-->
                <div class="card card-light">
                  <div class="card-header">
                    <h3 class="card-title">About School</h3>
                  </div>
                  <div class="card-body">
                    <strong><i class="fas fa-address-card mr-1"></i> NPSN</strong>

                    <p class="text-muted">
                      <?= $school['NPSN']; ?>
                    </p>

                    <hr />

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>
                      Address</strong>

                    <p class="text-muted"><?= $school['address']; ?></p>

                    <hr />

                    <strong><i class="fas fa-clock mr-1"></i> Status</strong>

                    <p class="text-muted"><?= $school['status_school']; ?></p>
                  </div>
                </div>
                <!-- End-About-Me-->
              </div>

              <!-- Panel -->
              <div class="col-md-9">
                <div class="card mb-3">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#market" data-toggle="tab">School</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <!-- Panel-Market -->
                      <div class="active tab-pane" id="market">
                        <div class="card card-widget widget-user">
                          <div class="widget-user-header text-white" style="background: url('../../../public_html/images/<?= $school['logo_school']; ?>') center center; opacity:0.8;">
                            <h3 class="widget-user-username text-right"><?= $school['name_school']; ?></h3>
                            <h5 class="widget-user-desc text-right"><?= $school['school_level']; ?></h5>
                          </div>
                          <div class="widget-user-image">
                            <img class="img-circle" src="../../../public_html/images/<?= $school['logo_school']; ?>" alt="User Avatar">
                          </div>
                        </div>
                      </div>
                      <!-- End-Panel-Market -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- End-Panel -->
            <?php else : ?>
              <div class="col text-center">
                <h2 class="text-center">Data tidak ada</h2>
              </div>
            <?php endif; ?>
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

    $(document).ready(function() {
      $('#myTable').DataTable();
    });

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