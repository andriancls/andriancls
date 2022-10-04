<?php
   require_once'koneksi.php';
   date_default_timezone_set("Asia/Bangkok");
// query SQL untuk insert data
  if(ISSET($_GET['id'])){
		$id=$_GET['id'];
		$tglout	=date("Y-m-d H:i:s",time());
		// var_dump($_GET);die;
		$query=mysqli_query($koneksi, "UPDATE `datacon` set tglout2 = '$tglout'  WHERE `id`='$id'") or die(mysqli_error());
		// $fetch=mysqli_fetch_array($query);
        // $datein             = $fetch['datein'];
		// $tglout				= date("y-m-d H:i:s",time());
		// $dateout            = $fetch['dateout'];
		// $nocon				= $fetch['nocon'];
		// $size				= $fetch['size'];
		// $poo         		= $fetch['poo'];
		// $loca 				= $fetch['loca'];
		
		
		
        
		
		
        // mysqli_query($koneksi, "INSERT INTO `datacon1` VALUES('$datein','$tglout','$dateout','$nocon','$size','$poo','$loca')")or die(mysqli_error());
		// mysqli_query($koneksi,"DELETE from datacon where id ='$id'")or die(mysqli_error());
		
		
        header("location: Reporting_Container.php");
		
  }
    


?>