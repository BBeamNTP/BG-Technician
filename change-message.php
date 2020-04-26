<?php
    require 'connection.php';
    echo $id = $_GET['id'];
    echo $email = $_GET['email'];
    echo $status = $_GET['status'];
    echo $text = $_POST['text'];
    $status2 = "";

    //admin
    if (isset($status) && $status =='wait'){ // กรณี สมัครใหม่ status = wait จะยังไม่มีข้อความ
        $query_message = "INSERT INTO message(user_id, email, text)
                    VALUES('$id', '$email', '$text')";
        if (mysqli_query($connect, $query_message)) {
            echo "Add message pass !! ";
        }
        echo "Status = WAIT: ".$status2 = "wait-fix";
        $query = "update users set status ='$status2' where id='$id'";
        if (mysqli_query($connect, $query)) { ?>
            <script type="text/javascript">
                alert("แจ้งเตือนผู้สมัครเรียบร้อยแล้ว")
                window.location.href = 'admin-index.php';
            </script>
        <?php } else {
            echo "error";
        }

    }else if (isset($status) && $status =='wait-fix'){ // กรณี admin แก้ไข message , status = wait-fix เหมือนเดิม
        $query = "update message set text ='$text' where user_id='$id'";
        if (mysqli_query($connect, $query)) {
            echo "Add message pass !! ";
        }
        echo "Status = WAIT-FIX : ".$status2 = "wait-fix";
        $query = "update users set status ='$status2' where id='$id'";
        if (mysqli_query($connect, $query)) { ?>
            <script type="text/javascript">
                alert("แจ้งเตือนผู้สมัครเรียบร้อยแล้ว")
                window.location.href = 'admin-index.php';
            </script>
        <?php } else {
            echo "error";
        }

    }else if (isset($status) && $status =='fixed'){ // กรณีเคยมีจข้อความแล้ว status = wait-fix เปลี่ยนข้อความที่แจ้ง ของ admin


        $query_message = "INSERT INTO message(user_id, email, text)
                    VALUES('$id', '$email', '$text')";
        if (mysqli_query($connect, $query_message)) {
            echo "Add message pass !! ";
        }
        echo "Status = FIXED : ".$status2 = "wait-fix";
        $query = "update users set status ='$status2' where id='$id'";
        if (mysqli_query($connect, $query)) { ?>
            <script type="text/javascript">
                alert("แจ้งเตือนผู้สมัครเรียบร้อยแล้ว")
                window.location.href = 'admin-index.php';
            </script>
        <?php } else {
            echo "error";
        }
    }else{

    }



?>