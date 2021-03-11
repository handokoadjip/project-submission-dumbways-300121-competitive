<?php

// KONEKSI DATABASE
$host = 'localhost';
$username = 'root';
$password = '';
$database = '2021_project_dumbways';

$base_url = 'http://localhost/dumbways/4';

$conn = mysqli_connect($host, $username, $password, $database);

function query($query)
{

  global $conn;

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function regis($data)
{

  global $conn;

  $name = strtolower(stripcslashes($data['name']));
  $email = strtolower(stripcslashes($data['email']));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $retype_password = mysqli_real_escape_string($conn, $data["retype_password"]);

  $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

  if (mysqli_fetch_assoc($result)) {
    $_SESSION['danger'] = "Email sudah dipakai";
    return false;
  }

  if ($password !== $retype_password) {
    $_SESSION['danger'] = "Password tidak sesuai";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO user (name, email, password) VALUES('$name', '$email', '$password')";

  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);
}

function login($data)
{
  global $conn;

  $email = $data["email"];
  $password = $data["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["login"] = true;
      $_SESSION["email"] = $email;
      header("Location: dashboard.php");

      return mysqli_affected_rows($conn);
      exit;
    } else {
      $_SESSION['danger'] = "Password salah";
      return false;
    }
  } else {
    $_SESSION['danger'] = "Email belum terdaftar";
    return false;
  }
}

function store($data)
{
  global $conn;

  $email = $_SESSION['email'];
  $user = query("SELECT * FROM user WHERE email = '$email' ")[0];

  $NPSN =  strtolower(stripcslashes($data['NPSN']));
  $name_school =  strtolower(stripcslashes($data['name_school']));
  $address =  strtolower(stripcslashes($data['address']));
  $logo_school = _uploadItem() ?? "default.jpg";
  $school_level =  strtolower(stripcslashes($data['school_level']));
  $status_school =  strtolower(stripcslashes($data['status_school']));
  $user_id =  $user['id'];

  if (!$logo_school) {
    $logo_school = "default.jpg";
  }

  $sql = "INSERT INTO school_tb (NPSN, name_school, address, logo_school, school_level, status_school, user_id) VALUES('$NPSN', '$name_school', '$address', '$logo_school', '$school_level', '$status_school', '$user_id')";

  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);
}

function update($data)
{
  global $conn;

  $id =  strtolower(stripcslashes($_GET['id']));
  $NPSN =  strtolower(stripcslashes($data['NPSN']));
  $name_school =  strtolower(stripcslashes($data['name_school']));
  $address =  strtolower(stripcslashes($data['address']));
  $logo_school_old = strtolower(stripcslashes($data['logo_school_old']));

  if ($_FILES['logo_school']['error'] === 4) {
    $logo_school = $logo_school_old;
  } else {
    $logo_school = _uploadItem() ?? "default.jpg";
    if ($logo_school_old !== "default.jpg") {
      unlink("../../../public_html/images/$logo_school_old");
    }
  }

  if (!$logo_school) {
    $logo_school = "default.jpg";
  }

  $school_level =  strtolower(stripcslashes($data['school_level']));
  $status_school =  strtolower(stripcslashes($data['status_school']));

  $query = "UPDATE school_tb SET NPSN = '$NPSN', name_school = '$name_school', address = '$address', logo_school = '$logo_school',school_level = '$school_level', status_school = '$status_school' WHERE id = $id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function destroy($id)
{
  global $conn;

  $logo = query("SELECT * FROM school_tb WHERE id = '$id' ")[0]['logo_school'];

  if ($logo !== "default.jpg") {
    unlink("../../../public_html/images/$logo");
  }

  mysqli_query($conn, "DELETE FROM school_tb WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function updateUser($data)
{
  global $conn;

  $id =  strtolower(stripcslashes($_GET['id']));
  $name =  strtolower(stripcslashes($data['name']));

  $query = "UPDATE user SET name = '$name' WHERE id = $id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function _uploadItem()
{
  $namaFile = $_FILES["logo_school"]["name"];
  $ukuranFile = $_FILES["logo_school"]["size"];
  $errorFile = $_FILES["logo_school"]["error"];
  $tmpName = $_FILES["logo_school"]["tmp_name"];

  if ($errorFile == 4) {
    $_SESSION['emptyImg'] = true;
    return false;
  }

  $ekstensiValid = ['jpg', 'jpeg', 'png'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));

  if (!in_array($ekstensiFile, $ekstensiValid)) {
    $_SESSION['fileEkstensi'] = true;
    return false;
  }

  if ($ukuranFile > 2000000) {
    $_SESSION['fileSize'] = true;
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiFile;
  move_uploaded_file($tmpName, "../../../public_html/images/$namaFileBaru");
  return $namaFileBaru;
}
