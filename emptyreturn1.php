<?php
   require_once'koneksi.php';
   date_default_timezone_set("Asia/Bangkok");
// query SQL untuk insert data
  if(isset($_POST['id'])){
		$id=$_POST['id'];
        $empty = $_POST['loca'];
        // var_dump($_POST);die;
		$query=mysqli_query($koneksi, "UPDATE `datacon` set isempty='$empty'  WHERE `id`='$id'") or die(mysqli_error());

        header("location: Notifications_MGL2.php");
		
  }
    


?>