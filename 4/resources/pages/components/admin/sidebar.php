  <!-- Brand-Logo -->
  <a href="../../pages/admin/dashboard.php" class="brand-link navbar-light">
    <img src="../../../public_html/vendors/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
    <span class="brand-text font-weight-light">School Data</span>
  </a>
  <!-- End-Brand-Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar-User-Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../../public_html/vendors/pos/img/default.jpg" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $user['name']; ?></a>
      </div>
    </div>
    <!-- End-Sidebar-User-Panel -->

    <!-- Sidebar-Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link <?= $page == "dashboard" ? "active" : null; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= $page == "school" || $page == "user" ? "menu-open" : null; ?>">
          <a href="#" class="nav-link <?= $page == "school" || $page == "user" ? "active" : null; ?>">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="school.php" class="nav-link <?= $page == "school" ? "active" : null; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  School
                </p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="user.php" class="nav-link <?= $page == "user" ? "active" : null; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  user
                </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End-Sidebar-Menu -->
  </div>
  <!-- End-Sidebar -->