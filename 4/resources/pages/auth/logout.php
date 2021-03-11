<?php

session_start();

if (isset($_SESSION['notif'])) {
  echo "<script>
        alert('test');
    </script>";
}

session_destroy();
session_unset();
$_SESSION = [];

$_SESSION['success'] = "Berhasil Logout";

header("Location: login.php");
