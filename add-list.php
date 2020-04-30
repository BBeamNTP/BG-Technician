<?php
require 'connection.php';
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
if (isset($_SESSION['email']) && $_GET['method'] =="add"){ // กรณี สมัครใหม่ status = wait จะยังไม่มีข้อความ
    $eq_name = $_POST['eq_name'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $sum_price = $price*$amount;
    $query_message = "INSERT INTO equipment(user_id, item, price, amount, total_price)
                    VALUES('$id', '$eq_name', '$price','$amount','$sum_price')";
    if (mysqli_query($connect, $query_message)) {
        header('location:equipment-list.php');
    }else{
        echo "error";
    }

}else if (isset($_SESSION['email']) && $_GET['method'] =="del") {

    $query = "DELETE FROM `equipment` WHERE user_id='$id'";
    if (mysqli_query($connect, $query)) { ?>
        <script type="text/javascript">
            alert("แจ้งเตือนผู้สมัครเรียบร้อยแล้ว")
            window.location.href = 'equipment-list.php';
        </script>
    <?php } else {
        echo "error";
    }

}else if(isset($_SESSION['email']) && $_GET['method'] =="del-1"){
    $item_id = $_GET['item_id']."<br>";
    $query = "DELETE FROM `equipment` WHERE user_id='$id' AND id='$item_id'";
    if (mysqli_query($connect, $query)) {
            header('location:equipment-list.php');
    } else {
        echo "error";
    }

}else{
    header('location:login.php');
}
?>