<?php
session_start();
require 'connection.php';
echo "active : ".$active = $_GET['active'];
echo "<br>";
echo "user_id : ".$user_id = $_GET['user_id'];
echo "<br>";
echo "you_id : ".$you_id = $_GET['id'];
echo "<br>";
echo "me_id : ".$me_id = $_SESSION['id'];
echo "<br>";
echo "Chat Room : ".$room_id = $_GET['room_id'];
echo "<br>";
echo "Text : ".$text = $_POST['text'];
echo "<br>";
if (!isset($_SESSION['email'])){
    header('location: login.php');
}

if($active == "comment"){
    echo "If adtive == comment";

    $query_comment = "INSERT INTO comment(technician_id, user_id, text)
                    VALUES('$you_id', '$user_id', '$text')";

    if (mysqli_query($connect, $query_comment)) {
//    echo "Add comment pass !! ";
    }else{
//    echo "Add comment error !! ";
    }
    mysqli_close($connect);

    header("location:profile-all.php?id=$you_id&active=comment");

}else if ($active == "chat"){
    echo "If adtive == comment";
    echo "<br>";
    if($room_id == "newroom"){
        echo "If room_id == newroom";

        $query_room = "INSERT INTO room(user_a, user_b)
                    VALUES('$me_id', '$you_id')";
        if (mysqli_query($connect, $query_room)) {
//    echo "Add comment pass !! ";
        }else{
//    echo "Add comment error !! ";
        }

        $sql="select id from room order by id desc limit 0,1";
        $result = mysqli_query($connect, $sql) ;
        $num_result  = mysqli_num_rows($result) ;
        $rowcount = mysqli_fetch_row($result) ;
        $newroom = $rowcount[0]+1 ; // นำค่า id มาเพิ่มให้กับค่ารหัสสมาชิกครั้งละ1

        $query_comment = "INSERT INTO chat(room_id, me_id, you_id, message)
                    VALUES('$newroom', '$me_id', '$you_id', '$text')";
        if (mysqli_query($connect, $query_comment)) {
//    echo "Add comment pass !! ";
        }else{
//    echo "Add comment error !! ";
        }
        mysqli_close($connect);

    }else{
        echo "If adtive == old room";

        $query_comment = "INSERT INTO chat(room_id, me_id, you_id, message)
                    VALUES('$room_id','$me_id', '$you_id', '$text')";
        if (mysqli_query($connect, $query_comment)) {
//    echo "Add comment pass !! ";
        }else{
//    echo "Add comment error !! ";
        }
        $query = "update room set date = CURRENT_TIMESTAMP where id='$room_id'";
        if (mysqli_query($connect, $query)) {
//    echo "update room pass !! ";
        } else {
            echo "error";
        }
        mysqli_close($connect);

    }


    header("location:profile-all.php?id=$you_id&active=chat");
}else{
    echo "ELSE : ";
//    header('location: login.php');
}

?>


