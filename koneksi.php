<?php
$host = "db";
$user = "sumitomo";
$pass = "sumitomo";
$db = "pblsumi";

//melakukan koneksi ke db
$koneksi = mysqli_connect($host, $user, $pass,$db);
if(!$koneksi){
	echo "Gagal konek: " . die(mysqli_error($koneksi));
}
?>