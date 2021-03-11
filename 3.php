<?php

/**
 * @return string
 */
function hollow_diamond()
{
  $diamond_star = 5;
  $diamond_star_up = round($diamond_star / 2, 0, PHP_ROUND_HALF_UP);
  $diamond_star_down = round($diamond_star / 2, 0, PHP_ROUND_HALF_DOWN);
  $l = $diamond_star_up;

  for ($i = 1; $i <= $diamond_star_down; $i++) {
    for ($j = 1; $j <= $diamond_star; $j++) {
      if ($j == $diamond_star_up || $j == $l) echo ("<span class='text-primary'> * </span>");
      else echo ("<span> &nbsp;&nbsp; </span>");
    }
    $diamond_star_up++;
    $l--;
    echo "<br>";
  }
  for ($i = 1; $i <= $diamond_star_up; $i++) {
    for ($j = 1; $j <= $diamond_star; $j++) {
      if ($j == $diamond_star_up || $j == $l) echo ("<span class='text-primary'> * </span>");
      else echo ("<span> &nbsp;&nbsp; </span>");
    }
    $diamond_star_up--;
    $l++;
    echo "<br>";
  }
  echo "<br>";
}

/**
 * @param int $params
 * 
 * @return string
 */
function cetak_pola($params)
{
  for ($i = 0; $i < $params; $i++) {
    hollow_diamond();
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hollow Diamond</title>
</head>

<body>
  <div class="container">
    <h1 class="my-5">Hollow Diamond</h1>
    <h2 class="mb-3">Form</h2>
    <form action="" method="post" class="mb-5">
      <div class="form-group">
        <label for="count">How many holow diamond</label>
        <input type="text" class="form-control" name="count" id="count" placeholder="count" maxlength="1" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php if (isset($_POST["submit"])) : ?>
      <h2 class="mb-3">Results</h2>
      <?= cetak_pola($_POST["count"]); ?>
    <?php endif; ?>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>