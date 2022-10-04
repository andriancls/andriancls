<?php
   require_once'koneksi.php';
   date_default_timezone_set("Asia/Bangkok");
// query SQL untuk insert data
  if(ISSET($_POST['id'])){
		$id=$_POST['id'];
		$tglout	= $_POST['datein']." ".date("H:i:s",time());
		$dateout = date('Y-m-d', strtotime($_POST['datein']. ' + 12 days'));
		$dateout2 = date('Y-m-d', strtotime($_POST['datein']. ' + 5 days'));
		// $dateout3 = date('Y-m-d', strtotime($_POST['tglout']. ' + 5 days'));
		// var_dump($tglout);die;
		$query=mysqli_query($koneksi, "UPDATE `datacon` set tglout = '$tglout', dateout2='$dateout2'   WHERE `id`='$id'") or die(mysqli_error());

		// $query=mysqli_query($koneksi, "UPDATE `datacon` set tglout = '$tglout'   WHERE `id`='$id'") or die(mysqli_error());
		// $fetch=mysqli_fetch_array($query);
        // $datein             = $fetch['datein'];
		// $tglout				= date("y-m-d H:i:s",time());
		   //$dateout            = date('Y-m-d', strtotime($datein. ' + 5 days'));
		// $nocon				= $fetch['nocon'];
		// $size				= $fetch['size'];
		// $poo         		= $fetch['poo'];
		// $loca 				= $fetch['loca'];
		
		
		
        
		
		
        // mysqli_query($koneksi, "INSERT INTO `datacon1` VALUES('$datein','$tglout','$dateout','$nocon','$size','$poo','$loca')")or die(mysqli_error());
		// mysqli_query($koneksi,"DELETE from datacon where id ='$id'")or die(mysqli_error());
		
		
        header("location: Notifications_Container2.php");
		
  }
    


?>