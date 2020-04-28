<?php
require 'connection.php';
$id = $_GET['id'];
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
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