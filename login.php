<?php
require 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CLS Login</title>
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
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>

<?php 



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/png" href="images/icons/OGP.png"/>
	<title>CLSLogin</title>
</head>
<body>
	<div class="container">
	<img class="logoatas" border="0" src="images/logosumi.png"  width="400px" style="none":50px;padding: 0px; color:white;">
		
		<form class="login-email" action="proses_login.php" method="post">
			<span class="login100">		
						<h4>Welcome</h4></p> 
						<h3>Container Loading System</h3>
						<h4>Sumitomo Wiring Systems Batam Indonesia</h4>
					</span>
					<br>
			<div class="input-group">
				<input type="nama" placeholder="Nama Karyawan" name="nama" required>
			</div>
			<div class="input-group">
				
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text"><a href="register.php">Register</a></p>
		</form>
	</div>
</body>
</html>