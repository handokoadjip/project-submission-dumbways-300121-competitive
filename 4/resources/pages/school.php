<?php

require '../config/functions.php';

$page = 'school';

$schools = query("SELECT * FROM school_tb");

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../../public_html/css/style.css">
  <link rel="stylesheet" href="../../public_html/css/utility.css">

  <title>School - Data School</title>
</head>

<body>
  <?php include("./components/landingpage/header.php"); ?>
  <main>
    <?php include("./components/landingpage/hero.php"); ?>
    <section style="margin-top: 100px !important;">
      <div class="container">
        <h2 class="text-center title">Lorem Ipsum</h2>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi labore magni officiis.</p>
        <div class="row">
          <?php foreach ($schools as $school) : ?>
            <div class="col-md-4 text-center mb-3">
              <div class="card">
                <img class="card-img-top _image-opacity" src="../../public_html/images/<?= $school['logo_school']; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title mb-0"><?= $school['name_school']; ?></h5>
                  <small>Level : <?= $school['school_level']; ?> | status : <span class="<?= $school['status_school'] == 'active' ? 'text-success' : 'text-danger'; ?>"><?= $school['status_school']; ?></span> </small>
                  <p class="card-text mt-3"><?= $school['address']; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </main>
  <?php include("./components/landingpage/footer.php"); ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>