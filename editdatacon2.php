<?php
 include("Koneksi.php"); // untuk memanggil file koneksi.php
 //$tglout   = $_GET['tglout'];
//query untuk delete data
//$datein=$_POST['datein'];
$id=$_POST['id'];

// $dateout2            = date('Y-m-d', strtotime($datein. ' + 5 days'));
$shipment = $_POST['shipping'];
$invoice = 'invoice= '.("'".$_POST['invoice']."'" ?? NULL) ;

// var_dump($_POST);die;

// $sql1 = mysqli_query($koneksi, "UPDATE datacon set forwarder_id = '$forwarder' , datein = '$datein' , dateout2 = '$dateout2' , dateout ='$dateout' , nocon='$nocon', 
// size='$size' , poo='$poo', loca= '$loca' where id= '$id' ");

$sql = mysqli_query($koneksi, "UPDATE datacon set $invoice , shipment='$shipment' where id= '$id' ");


//$query=mysql_query("DELETE FROM datacon where tglout='$tglout'");
//setelah data dihapus redirect ke halaman tampil.php
// var_dump($_POST);die;
header("Location:Reporting_MGL.php");
?>