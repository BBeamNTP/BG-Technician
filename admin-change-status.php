<?php
require 'connection.php';
$id = $_GET['id'];
$status = $_GET['status'];
if (isset($status) && $status != "technician") {
    $query = "update users set status ='technician' where id='$id'";
    if (mysqli_query($connect, $query)) { ?>
        <script type="text/javascript">
            // alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
            window.location.href = 'profile-all.php?id= <?php echo $id ?>';
        </script>
    <?php } else {
        echo "error";
    }
} else {
    $query = "update users set status ='wait' where id='$id'";
    if (mysqli_query($connect, $query)) { ?>
        <script type="text/javascript">
            // alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
            window.location.href = 'profile-all.php?id= <?php echo $id ?>';
        </script>
    <?php } else {
        echo "error";
    }
}
?>