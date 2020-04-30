<?php
$connect = mysqli_connect("localhost", "root", "", "bg-database") or die(mysqli_error($connect));
//$connect = mysqli_connect("tuy8t6uuvh43khkk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "icxjv0z1iichmwcd", "e1qxalvchji0wf5d", "s9cuski8d4sc8xhe") or die(mysqli_error($connect));

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}else{
//    echo "Connect success";
}
?>
