<?php
session_start();

include 'koneksi.php';


$nama=$_POST["nama"];
$pass=$_POST["password"];
$query = "SELECT * FROM user WHERE nama='".$nama."' and password='".$pass."'";
$data=mysqli_query($koneksi,$query) ;
// if (!$koneksi -> query("SELECT * FROM user WHERE nama='".$nama."' and password='".$pass."'")) {
// 	echo("Error description: " . $koneksi -> error);die;
//   }


$jumlah = mysqli_num_rows($data);


if ($jumlah==1){
	
	$row = mysqli_fetch_array($data);

	$_SESSION["nama"] =$row["nama"];
	$_SESSION["password"] =$row["password"];

	header("Location: Appointment_Container.php");
}else{	
	echo"<h3>Data Anda Tidak Valid</h3>";
	echo"Klik sign up untuk membuat akun";
	echo"<br><a href='Register.php'><b>SIGN UP</b></a>";

}
?>