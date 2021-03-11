<?php

/**
 * @param string $huruf
 * @param string $kalimat
 * 
 * @return int
 */
function hitungHurufDariKalimat($huruf, $kalimat)
{
  $replace = str_replace(' ', '', $kalimat);
  $array = str_split(strtolower($replace));
  $count = 0;
  for ($i = 0; $i < count($array); $i++) {
    if ($huruf == $array[$i]) {
      $count++;
    }
  }

  return $count;
}

$is_click = isset($_POST["submit"]);
if ($is_click) {
  $character = $_POST['character'];
  $count = hitungHurufDariKalimat($character, $_POST['sentence']);
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

  <title>Count Character</title>
</head>

<body>
  <div class="container">
    <h1 class="my-5">Count character</h1>
    <h2 class="mb-3">Form</h2>
    <form action="" method="post" class="mb-5">
      <div class="form-group">
        <label for="character">Characters you want to count</label>
        <input type="text" class="form-control" name="character" id="character" placeholder="character" maxlength="1" required>
      </div>
      <div class="form-group">
        <label for="sentence">Sentence</label>
        <textarea class="form-control" name="sentence" id="sentence" rows="3" placeholder="sentence" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php if ($is_click) : ?>
      <div class="card p-3 mb-5">
        <h2>Results</h2>
        <p>Hasil Hitung huruf “<?= $character; ?>” muncul sebanyak <?= $count; ?> kali</p>
      </div>
    <?php endif; ?>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>