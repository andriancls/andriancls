<?php
$servername = "db";
$username = "sumitomo";
$password = "sumitomo";
$dbname = "pblsumi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// var_dump($_POST);die;

$datein             = $_POST['datein'];
$dateout = setdateout($_POST['poo'],$_POST['section'],$_POST['datein']);
$dateout2 = setdateout2($_POST['poo'],$_POST['section'],$_POST['datein']);
$nocon				= $_POST['nocon'];
$size				= $_POST['size'];
$poo         		= $_POST['poo'];
$loca 				= $_POST['loca'];
$forwarder 				= $_POST['forwarder'];
$section = $_POST['section'];
function setdateout($poo , $section,$datein){
  if($poo == 'Japan' && $section== 'Export'){
      return date('Y-m-d' , strtotime($datein. ' + 11 days'));
  }
  if($poo == 'Empty' && $section== 'Export'){
      return date('Y-m-d' , strtotime($datein. ' + 4 days'));
  }
  return date('Y-m-d' , strtotime($datein. ' + 11 days'));
}
function setdateout2($poo , $section,$datein){
  if($poo == 'Japan' && $section== 'Export'){
      return date('Y-m-d' , strtotime($datein. ' + 11 days'));
  }
  if($poo == 'Empty' && $section== 'Export'){
      return date('Y-m-d' , strtotime($datein. ' + 4 days'));
  }
  return date('Y-m-d' , strtotime($datein. ' + 4 days'));
}



// $sql = "INSERT INTO datacon VALUES (NULL,'$datein','$dateout','$dateout2','nama','$forwarder',NULL,NULL,NULL,'$nocon','$size','$poo','$loca','$section',0)";
$sql = "INSERT INTO datacon VALUES (NULL,'$datein','$dateout','$dateout2','nama','$forwarder',NULL,NULL,NULL,'$nocon','$invoice','$size','$poo','$loca','$section',0,'$shipment')";

if (mysqli_multi_query($conn, $sql)) {
  header("location:Appointment_Container.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $conn->close();

}



?>