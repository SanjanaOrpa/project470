<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBname = "pharmacy";

$conn =  mysqli_connect($servername, $dBUsername ,$dBPassword);
if($conn->connect_error){
  die('connection failed : ' .$conn->connect_error);
}
else{
  mysqli_select_db($conn,$dbname);
  //echo "connection successful";
}
?>
