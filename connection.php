<?php
$connect = mysqli_connect("localhost", "root", "", "bg-database") or die(mysqli_error($connect));
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}else{
//    echo "Connect success";
}
?>
