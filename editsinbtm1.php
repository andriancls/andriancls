<?php
   require_once'koneksi.php';
   date_default_timezone_set("Asia/Bangkok");
// query SQL untuk insert data
  if(ISSET($_POST['id'])){
		$id=$_POST['id'];
		$etasin=$_POST['etasin']." ".date("H:i:s",time());
		
		$tglout	= $_POST['datein']." ".date("H:i:s",time());
		$dateout = date('Y-m-d', strtotime($_POST['datein']. ' + 12 days'));
		$dateout2 = ($_POST['section'] == 'Export')?setdateout2($_POST['poo'],$_POST['section'],$etasin) :setdateout2($_POST['poo'],$_POST['section'],$tglout);
		
		
		// $dateout3 = date('Y-m-d', strtotime($_POST['tglout']. ' + 5 days'));
		//var_dump($_POST['dateout2']);die;

		
		
		$query=mysqli_query($koneksi, "UPDATE `datacon` set tglout = '$tglout', dateout2 = '$dateout2'  WHERE `id`='$id'") or die(mysqli_error());
		
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
		
        header("location: Notifications_MGL2.php");
		
		}
		function setdateout2($poo , $section,$datein){
			if($poo == 'Japan' && $section== 'Export'){
				return date('Y-m-d' , strtotime($datein. ' + 11 days'));
			}
			if($poo == 'Japan' && $section== 'Import'){
				return date('Y-m-d' , strtotime($datein. ' + 4 days'));
			}
			return date('Y-m-d' , strtotime($datein. ' + 4 days'));
		}
		function dendasin($lambat, $kembali, $days, $size, $poo, $section)
                        {
                            if ($lambat < $kembali) {
                                return 0;
                            } else {
                                if ($poo == 'Japan' && $section == 'Export') {
                                    return ($days * (($size == 20) ? 50 : 70));
                                }
                                if ($poo == 'Empty') {
                                    return ($days * (($size == 20) ? 50 : 75));
                                }
                                return ($days * (($size == 20) ? 50 : 100));
                            }
                        }
        function dendabtm($lambat, $kembali, $days, $size, $poo, $section)
                        {
                            if ($lambat < $kembali) {
                                return 0;
                            } else {
                                if ($poo == 'Japan' && $section == 'Export') {
                                    return ($days * (($size == 20) ? 50 : 70));
                                }
                                if ($poo == 'Empty') {
                                    return ($days * (($size == 20) ? 50 : 75));
                                }
                                return ($days * (($size == 20) ? 30 : 50));
                            }
                        }
		

?>