<?php

session_start();
require '../../config/functions.php';

$email = $_SESSION['email'];
$user = query("SELECT * FROM user WHERE email = '$email' ")[0];

$id = $_GET["id"];
$school = query("SELECT * FROM school_tb WHERE id = $id")[0];
$image = $school['logo_school'];
unlink("../admin/assets/pos/img/$image");

if ($user['id'] != $school['user_id']) {
	header('Location: school.php');
}

if (destroy($id) > 0) {
	header("Location: school.php");
	$_SESSION['success'] = "Data berhasil dihapus";
} else {
	echo "
			<script>
				alert('data gagal dihapus');
			</script>
		";
}
