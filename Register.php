<?php 

require 'koneksi.php';

error_reporting(0);

session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CLS Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/OGP.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/Register.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container">
	<img class="logoatas" border="0" src="images/logosumi.png"  width="400px">
	<form class="login-email" action="proses_signup.php" method="POST">
            <p class="login101" style="font-size: 40px; font-weight: 800;">Register</p>
			<span class="login99-form-title">
						<h5>Container Loading System</h5>
						<h6>PT. Sumitomo Wiring Systems Batam Indonesia</h6>
					</span>
			<br>
			<div class="input-group">
				<input type="nokar" placeholder="Nomor Karyawan" name="nokar" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="nama" placeholder="nama" name="nama"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"  required>
			</div>
			
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Sudah Daftar? <a href="login.php">Login </a></p>
		</form>
	</div>
</body>
</html>