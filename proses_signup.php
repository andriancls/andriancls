<?php

include 'koneksi.php';
$nokar = $_POST['nokar'];
$email = $_POST['email'];
$nama  = $_POST ['nama'];
$password = $_POST['password'];
$hash =password_hash($pass, PASSWORD_BCRYPT);
$input = mysqli_query($koneksi, "INSERT INTO user VALUES('$nokar','$email','$nama','$password')");

if ($input) {
	header("location:login.php");
	exit;
}

?>
