<?php
require 'connection.php';
echo $id = $_GET['id'];
//
$query = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($connect, $query);
if (mysqli_query($connect, $query)) { ?>
    <script type="text/javascript">
        alert("ลบผู้ใช้งานเรียบร้อย")
        window.location.href = 'admin-index.php';
    </script>
<?php } else {
    echo "error";
}
?>