<?php

require "resources/config/functions.php";

$page = 'home';

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./public_html/css/style.css">
  <link rel="stylesheet" href="./public_html/css/utility.css">

  <title>School - Home</title>
</head>

<body>
  <?php include("resources/pages/components/landingpage/header.php"); ?>
  <main>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active _slider-after">
          <img class="d-block w-100 _slider-image" src="https://edsource.org/wp-content/uploads/2020/05/Alliance-College-Ready-school-classroom.jpg" alt="First slide" style="height:80vh; object-fit:cover">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="title">Very comfortable</h5>
            <p>comfortable school with cool facilities</p>
          </div>
        </div>
        <div class="carousel-item _slider-after">
          <img class="d-block w-100 _slider-image" src="https://www.mcpsmt.org/cms/lib/MT01001940/Centricity/ModuleInstance/18374/large/Elementary%20Classroom.jpg" alt="Second slide" style="height:80vh; object-fit:cover">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="title">Learning fun</h5>
            <p>study with a very cool teacher</p>
          </div>
        </div>
        <div class="carousel-item _slider-after">
          <img class="d-block w-100 _slider-image" src="https://3.files.edl.io/41e6/19/09/04/154416-891f7593-f657-4823-9331-2c47187e5439.jpg" alt="Third slide" style="height:80vh; object-fit:cover">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="title">Complete school data</h5>
            <p>complete school is all here</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <section class="mt-5">
      <div class="container">
        <h2 class="text-center title">Lorem Ipsum</h2>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi labore magni officiis.</p>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img class="card-img-top _image-opacity" src="https://edsource.org/wp-content/uploads/2020/05/Alliance-College-Ready-school-classroom.jpg" alt="Card image cap" style="height: 250px; object-fit:cover;">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img class="card-img-top _image-opacity" src="https://www.mcpsmt.org/cms/lib/MT01001940/Centricity/ModuleInstance/18374/large/Elementary%20Classroom.jpg" alt="Card image cap" style="height: 250px; object-fit:cover;">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img class="card-img-top _image-opacity" src="https://3.files.edl.io/41e6/19/09/04/154416-891f7593-f657-4823-9331-2c47187e5439.jpg" alt="Card image cap" style="height: 250px; object-fit:cover;">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section style="margin-top: 100px !important;">
      <div class="container">
        <h2 class="text-center title">Lorem Ipsum</h2>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi labore magni officiis.</p>
        <div class="row">
          <div class="col-md-6 d-flex align-items-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit repellat quae neque corporis officia voluptatibus quibusdam officiis laborum ex cum recusandae quis blanditiis dicta a dolore similique ea nesciunt quod accusamus, laudantium explicabo nam doloremque reiciendis. Nam pariatur fugiat incidunt! Blanditiis maiores in sequi porro ullam delectus deserunt, velit soluta aliquam a animi voluptas. Inventore alias neque dolore cum aspernatur, consequuntur provident, veritatis eum pariatur enim dignissimos, aut dicta maxime quam praesentium sint? Repellat libero facilis asperiores temporibus tempora natus dolorum unde quod, id expedita alias ducimus non voluptate amet ipsum ea consequatur!</p>
          </div>
          <div class="col-md-6 p-0">
            <div class="_slider-after">
              <img class="card-img-top" src="https://www.mcpsmt.org/cms/lib/MT01001940/Centricity/ModuleInstance/18374/large/Elementary%20Classroom.jpg" alt="Card image cap">
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

    <section style="margin-top: 100px !important;">
      <div class="container">
        <h2 class="text-center title mb-3">Lorem Ipsum</h2>
        <div class="row">
          <div class="col text-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit repellat quae neque corporis officia voluptatibus quibusdam officiis laborum ex cum recusandae quis blanditiis dicta a dolore similique ea nesciunt quod accusamus</p>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include("resources/pages/components/landingpage/footer.php"); ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>