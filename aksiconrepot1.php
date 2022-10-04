<?php
   require_once'koneksi.php';
   date_default_timezone_set("Asia/Bangkok");
// query SQL untuk insert data
  if(ISSET($_GET['id'])){
		$id=$_GET['id'];
		$tglout	= date("y-m-d H:i:s",time());
		$dateout = setdateout($_POST['poo'],$_POST['section'],$_POST['datein']);
		$dateout2 = setdateout2($_POST['poo'],$_POST['section'],$_POST['datein']);
		$query=mysqli_query($koneksi, "UPDATE `datacon` set tglout = '$tglout'  WHERE `id`='$id'") or die(mysqli_error());
		// $fetch=mysqli_fetch_array($query);
        // $datein             = $fetch['datein'];
		// $tglout				= date("y-m-d H:i:s",time());
		// $dateout            = $fetch['dateout'];
		// $nocon				= $fetch['nocon'];
		// $size				= $fetch['size'];
		// $poo         		= $fetch['poo'];
		// $loca 				= $fetch['loca'];
		function setdateout($poo , $section,$datein){
			if($poo == 'Japan' && $section== 'Export'){
				return date('Y-m-d' , strtotime($datein. ' + 11 days'));
			}
			if($poo == 'Empty' && $section== 'Export'){
				return date('Y-m-d' , strtotime($datein. ' + 4 days'));
			}
			return date('Y-m-d' , strtotime($datein. ' + 11 days'));
		  }
		
		
        
		
		
        // mysqli_query($koneksi, "INSERT INTO `datacon1` VALUES('$datein','$tglout','$dateout','$nocon','$size','$poo','$loca')")or die(mysqli_error());
		// mysqli_query($koneksi,"DELETE from datacon where id ='$id'")or die(mysqli_error());
		
		
        header("location: Notifications_MGL2.php");
		
  }
    


?>