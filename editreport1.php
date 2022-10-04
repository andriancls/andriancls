<?php
   require_once'koneksi.php';
   date_default_timezone_set("Asia/Bangkok");
// query SQL untuk insert data
  if(isset($_POST['id']) && !isset($_POST['returndate'])){
		$id=$_POST['id'];
		$tglout2	= $_POST['datein'];
		$query=mysqli_query($koneksi, "UPDATE `datacon` set tglout2 = '$tglout2'  WHERE `id`='$id'") or die(mysqli_error());
    
        header("location: Reporting_Container.php");
		
  }
  //if(isset($_POST['id']) && isset($_POST['returndate'])){
		//$id=$_POST['id'];
		//$tglout2	= $_POST['datein'];
		//$tglout3	= $_POST['returndate'] ?? NULL;
		//$query=mysqli_query($koneksi, "UPDATE `datacon` set tglout2 = '$tglout2'  WHERE `id`='$id'") or die(mysqli_error());
    
        //header("location: Reporting_MGL.php");
		
  //}
    


?>