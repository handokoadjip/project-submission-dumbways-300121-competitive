<?php

/**
 * Class House
 *
 * @package   Dumbways : Handoko Adji Pangestu
 * @author    Handoko Adji Pangestu <Handokoadjipangestu@gmail.com>
 * @copyright Copyright (c) 2021 - 2022, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

class House
{
  /**
   * @var int $id
   * @var string $type
   * @var int $price
   * @var string $image
   */
  public $id, $type, $price, $image;

  /**
   * @param int $id
   * @param string $type
   * @param int $price
   * @param string $image
   */
  public function __construct($id, $type, $price, $image)
  {
    $this->id = $id;
    $this->type = $type;
    $this->price = $price;
    $this->image = $image;
  }
}

$rose = new House(1, "Rose", 120000000, "https://thumbor.forbes.com/thumbor/fit-in/1200x0/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F1026205392%2F0x0.jpg");

$gold = new House(2, "Gold", 300000000, "https://cdn-cms.pgimgs.com/news/2020/03/jual-rumah.jpg");

$platinum = new House(3, "Platinum", 360000000, "https://static.dezeen.com/uploads/2020/02/house-in-the-landscape-niko-arcjitect-architecture-residential-russia-houses-khurtin_dezeen_2364_hero.jpg");

$houses = array($rose, $gold, $platinum);

class Utilities
{
  /**
   * @param int $price
   * 
   * @return string
   */
  public function currency($price)
  {

    $result_price = "Rp " . number_format($price, 0, ',', '.');
    return $result_price;
  }
}

$number_format = new Utilities;

$is_click = isset($_POST["submit"]);
if ($is_click) {
  $data = $_POST;

  $type = htmlspecialchars($data["type"]);
  $installments = htmlspecialchars($data["installments"]);

  $house_type;
  $house_price;
  for ($i = 0; $i < count($houses); $i++) {
    if ($type == $houses[$i]->id) {
      $house_type = $houses[$i]->type;
      $house_price = $houses[$i]->price;

      break;
    }
  }

  $house_dp = $house_price * 20 / 100;
  $house_sisa = $house_price - $house_dp;
  $house_installments = $house_sisa / $installments;
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <title>House Purchase</title>
</head>

<body>
  <div class="container">
    <h1 class="my-5">Home purchase</h1>
    <h2 class="mb-3">Tipe House</h2>
    <div class="row mb-4">
      <?php foreach ($houses as $house) : ?>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="<?= $house->image; ?>" alt="Card image cap" style="height:200px;object-fit:cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $house->type; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= $number_format->currency($house->price); ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <form action="" method="post" class="mb-5">
      <div class="form-group">
        <label for="type">Type house</label>
        <select id="type" class="form-control" name="type" required>
          <?php foreach ($houses as $house) : ?>
            <option value="<?= $house->id; ?>"><?= $house->type; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="installments">Installments</label>
        <input type="number" class="form-control" name="installments" id="installments" placeholder="installments" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php if ($is_click) : ?>
      <div class="card p-3 mb-5">
        <h2>Installment</h2>
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col" class="text-center">months</th>
              <th scope="col" class="text-center">installments</th>
              <th scope="col" class="text-center">the rest of installments</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 1; $i <= $installments; $i++) : ?>
              <tr>
                <th scope="row" class="text-center"><?= $month = $i; ?></th>
                <td class="text-right"><?= $number_format->currency($house_installments); ?></td>
                <td class="text-right"><?= $number_format->currency($house_sisa = $house_sisa - $house_installments); ?></td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>