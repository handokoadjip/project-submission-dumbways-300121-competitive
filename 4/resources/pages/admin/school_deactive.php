<?php
session_start();
require '../../config/functions.php';

$page = 'school';

$email = $_SESSION['email'];
$user = query("SELECT * FROM user WHERE email = '$email' ")[0];

if (!$email) {
  header('Location: ../auth/login.php');
}

$schools = query("SELECT * FROM school_tb WHERE status_school = 'deactive'");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>School - Data School: Deactive</title>

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
              <h1>School Data Deactive</h1>

            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="school.php">School</a></li>
                <li class="breadcrumb-item active">Deactive</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- End-Content-Header -->

      <!-- Main-Content -->
      <section class="content">
        <div class="container-fluid">
          <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['success']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <?php unset($_SESSION['success']); ?>

          <div class="card p-3">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="input-group-append">
                    <a href="school.php" class="btn btn-sm btn-primary mr-3">
                      Back
                    </a>
                  </div>
                </div>
              </div>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NPSN</th>
                    <th scope="col">School</th>
                    <th scope="col">Address</th>
                    <th scope="col">Level</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($schools as $key => $school) : ?>
                    <tr>
                      <th scope="row"><?= $key + 1; ?></th>
                      <td><?= $school['NPSN']; ?></td>
                      <td><?= $school['name_school']; ?></td>
                      <td><?= $school['address']; ?></td>
                      <td><?= $school['school_level']; ?></td>
                      <td class="<?= $school['status_school'] == 'active' ? 'text-success' : 'text-danger'; ?>"><?= $school['status_school']; ?></td>
                      <td>
                        <a href="school_show.php?id=<?= $school['id']; ?>" class="btn btn-sm btn-info">Detail</a>
                        <?php if ($user['id'] == $school['user_id']) : ?>
                          <a href="school_edit.php?id=<?= $school['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                          <a href="school_destroy.php?id=<?= $school['id']; ?>" class="btn btn-sm btn-danger hapus">Delete</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

    $(".hapus").on("click", function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apa kamu yakin?',
        text: "Anda tidak dapat mengembalikan ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    });
  </script>
</body>

</html>