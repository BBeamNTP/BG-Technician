<?php
require 'connection.php';
$technician = $_GET['id'];
$user_id = $_GET['user_id'];
$text = $_POST['text'];

if (!isset($_SESSION['email'])){
    header('location: login.php');
}
$query_comment = "INSERT INTO comment(technician_id, user_id, text)
                    VALUES('$technician', '$user_id', '$text')";

if (mysqli_query($connect, $query_comment)) {
//    echo "Add comment pass !! ";
}else{
//    echo "Add comment error !! ";
}
header("location:profile-all.php?id=$technician&active=4");

?>

<!--<script type="text/javascript">-->
<!--    alert("แสดงความคิดเห็นเรียบร้อย")-->
<!--    window.location.href = 'profile-all.php?id= --><?php //echo $technician ?>//';
<!--//</script>-->

