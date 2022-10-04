<?php
 include("Koneksi.php"); // untuk memanggil file koneksi.php
 //$tglout   = $_GET['tglout'];
//query untuk delete data
//$datein=$_POST['datein'];
$id=$_POST['id'];
$datein             = $_POST['datein'];
$dateout = setdateout($_POST['poo'],$_POST['section'],$_POST['datein']);
// $dateout2            = date('Y-m-d', strtotime($datein. ' + 5 days'));
$nocon				= $_POST['nocon'];
$invoice = $_POST['invoice'] ?? NULL ;
$size				= $_POST['size'];
$poo         		= $_POST['poo'];
$loca 				= $_POST['loca'];
$forwarder 				= $_POST['forwarder'];
$section = $_POST['section'];
$shipment = $_POST['shipment'];
// var_dump($_GET);die;

// $sql1 = mysqli_query($koneksi, "UPDATE datacon set forwarder_id = '$forwarder' , datein = '$datein' , dateout2 = '$dateout2' , dateout ='$dateout' , nocon='$nocon', 
// size='$size' , poo='$poo', loca= '$loca' where id= '$id' ");
function setdateout($poo , $section,$datein){
    if($poo == 'Japan' && $section== 'Export'){
        return date('Y-m-d' , strtotime($datein. ' + 11 days'));
    }
    if($poo == 'Empty' && $section== 'Export'){
        return date('Y-m-d' , strtotime($datein. ' + 4 days'));
    }
    return date('Y-m-d' , strtotime($datein. ' + 11 days'));
  }

  
$sql1 = mysqli_query($koneksi, "UPDATE datacon set forwarder_id = '$forwarder' , datein = '$datein'  , dateout ='$dateout' , nocon='$nocon', 
size='$size' , poo='$poo', loca= '$loca', section= '$section', shipment='$shipment' where id= '$id' ");

//$query=mysql_query("DELETE FROM datacon where tglout='$tglout'");
//setelah data dihapus redirect ke halaman tampil.php
// var_dump($_POST);die;
header("Location:Appointment_Container.php");
?>