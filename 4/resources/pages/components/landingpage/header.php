<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow">
  <div class="container">
    <a class="navbar-brand mr-5" href="index.php">School</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= $page == "home" ? "active" : null; ?>">
          <a class="nav-link mr-3" href="<?= $base_url; ?>/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?= $page == "about" ? "active" : null; ?>">
          <a class="nav-link mr-3" href="<?= $base_url; ?>/resources/pages/about.php">About Us</a>
        </li>
        <li class="nav-item <?= $page == "school" ? "active" : null; ?>">
          <a class="nav-link mr-3" href="<?= $base_url; ?>/resources/pages/school.php">School</a>
        </li>
        <li class="nav-item <?= $page == "contact" ? "active" : null; ?>">
          <a class="nav-link mr-3" href="<?= $base_url; ?>/resources/pages/contact.php">Contact Us</a>
        </li>
      </ul>
      <a href="<?= $base_url; ?>/resources/pages/auth/login.php" class="btn btn-lg btn-success">login</a>
    </div>
  </div>
</nav>