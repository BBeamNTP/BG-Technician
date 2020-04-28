<?php
require 'header.php';
require 'connection.php';
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
    $id = $_GET['id'];
    $email = $_GET['email'];
//    $status = $_GET['status'];
    $query = "SELECT * FROM users WHERE id = '$id' and email = '$email'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $status = $row['status'];


    $query = "SELECT * FROM message WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $text = $row['text'];
    $message1 = "แจ้งการแก้ไข ให้ผู้สมัคร";
    $message2 = "กรุณาแก้ไขข้อมูล";
    $message3 = "อยู่ระหว่างการตรวจสอบข้อมูล";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .bottomred
        {
            border-bottom-color:#F00;
            border-bottom-style:solid;
            border-bottom-width:5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>สถานะการสมัครสมาชิก รหัส <?php echo "\n $id \n"?>  อีเมล <?php echo "\n $email "?></h2>

    <div class="col-md-10">
    </div>
    <div class="col-md-2">
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "admin" ) {?>
        <form method="post" action="admin-index.php">
            <input type="submit" class="btn btn-primary" value="กลับสู่หน้าหลัก">
        </form>
        <?php }else{?>
            <br>
       <?php } ?>

    </div>
    <div class="jumbotron col-md-12 " style="border:5px solid #898485;" align="center">
        <h3><?php

            if ($_SESSION['status'] == 'admin') {
                echo $message1;
            }else if ($status == 'wait-fix') {
                echo $message2;
            }else{
                echo $message3;
            }

            ?></h3>
        <p>...</p>
        <?php if (isset($_SESSION['status']) && ($_SESSION['status'] == "admin") ) {?>
        <form method="post" action="change-message.php?id=<?php echo $id ?>&email=<?php echo $email ?>&status=<?php echo $status ?>">

            <div class="form-group">
                <textarea class="form-control" rows="4" name="text" id="text" placeholder="รายละเอียด" style="text-align: center" ><?php echo $text ?></textarea>
            </div>
            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="ยืนยันข้อมความ ถึงผู้สมัคร">

        </form>
        <?php }else{ ?>
        <form method="post" action="profile-technician.php">
            <?php if (isset($status) && $status == "wait-fix") {?>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="detail" placeholder="รายละเอียด"
                          style="text-align: center" disabled><?php echo $text ?></textarea>
            </div>
            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="ไปยังหน้าแก้ไขข้อมูล">
            <?php } else if (isset($status) && ($status == "fixed") || ($status == "wait")) {?>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="detail" placeholder="รายละเอียด"
                          style="text-align: center" disabled><?php echo $text ?>ผู้ดูแลระบบกำลังเร่งตรวจสอบข้อมูลของท่าน ขออภัยในความล่าช้า</textarea>
            </div>
            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="ไปยังหน้าแก้ไขข้อมูล" disabled>
            <?php } else if (isset($status) && $status == "technicial"){
            }else{
                echo "กรุณาเข้าสู่ระบบใหม่อีกครั้ง";
            }
        } ?>
        </form>
    </div>
</div>

</body>
<footer>

</footer>
</html>

