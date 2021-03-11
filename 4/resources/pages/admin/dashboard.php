<?php
session_start();
require '../../config/functions.php';

$page = 'dashboard';

$email = $_SESSION['email'];
$user = query("SELECT * FROM user WHERE email = '$email' ")[0];

$schools = query("SELECT COUNT(id) as total FROM school_tb")[0];
$schoolActive = query("SELECT COUNT(id) as total FROM school_tb WHERE status_school = 'active'")[0];
$schoolDeactive = query("SELECT COUNT(id) as total FROM school_tb WHERE status_school = 'deactive'")[0];
$users = query("SELECT COUNT(id) as total FROM user")[0];

if (!$email) {
  header('Location: ../auth/login.php');
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>School - Dashboard</title>

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
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- End-Content-Header -->

      <!-- Main-Content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small-Boxes -->
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-lg-6 col-6">
                  <div class="small-box bg-light">
                    <div class="inner">
                      <h3><?= $schools['total']; ?></h3>

                      <p>Schools</p>
                    </div>
                    <div class="icon">
                      <i class="fas fas fa-school"></i>
                    </div>
                    <a href="school.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-6 col-6">
                  <div class="small-box bg-light">
                    <div class="inner">
                      <h3><?= $users['total']; ?></h3>

                      <p>User</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-6">
                  <div class="small-box bg-light">
                    <div class="inner">
                      <h3><?= $schoolActive['total']; ?></h3>

                      <p>School Active</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-check""></i>
                    </div>
                    <a href=" school_active.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-6 col-6">
                    <div class="small-box bg-ligh">
                      <div class="inner">
                        <h3><?= $schoolDeactive['total']; ?></h3>

                        <p>School Deactive</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-times"></i>
                      </div>
                      <a href="school_deactive.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card bg-light">
                  <div class="card-header">
                    <h5 class="card-title dashboard">Most School</h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    <p class="text-center">
                      <strong>More info</strong>
                    </p>

                    <!-- Most-Items-Sold -->
                    <div class="progress-group">
                      ---
                      <span class="float-right"><b>80</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-lightblue" style="width: 80%;"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      ---
                      <span class="float-right"><b>75</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-maroon" style="width: 75%;"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      <span class="progress-text">---</span>
                      <span class="float-right"><b>60</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-teal" style="width: 60%;"></div>
                      </div>
                    </div>
                    <!-- End-Most-Items-Dold -->

                    <div class="progress-group">
                      ---
                      <span class="float-right"><b>50</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-orange" style="width: 50%;"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End-Small-Boxes -->

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