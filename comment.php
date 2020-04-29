<?php
session_start();
require 'connection.php';
$active = $_GET['active'];
//echo "<br>";
 $user_id = $_GET['user_id'];
//echo "<br>";
$you_id = $_GET['id'];
//echo "<br>";
$me_id = $_SESSION['id'];

$text = $_POST['text'];
if (!isset($_SESSION['email'])){
    header('location: login.php');
}

if($active == "comment"){
    $query_comment = "INSERT INTO comment(technician_id, user_id, text)
                    VALUES('$you_id', '$user_id', '$text')";

    if (mysqli_query($connect, $query_comment)) {
//    echo "Add comment pass !! ";
    }else{
//    echo "Add comment error !! ";
    }
    header("location:profile-all.php?id=$you_id&active=comment");

}else if ($active == "chat"){
    $query_comment = "INSERT INTO chat(me_id, you_id, message)
                    VALUES('$me_id', '$you_id', '$text')";

    if (mysqli_query($connect, $query_comment)) {
//    echo "Add comment pass !! ";
    }else{
//    echo "Add comment error !! ";
    }
    header("location:profile-all.php?id=$you_id&active=chat");
}else{
    echo "ELSE : ";
//    header('location: login.php');
}

?>


