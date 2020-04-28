<?php
session_start();
require 'connection.php';

echo $star = $_POST['whatever1'];
echo '<br>';
echo $tecinician_id = $_GET['id'];
echo '<br>';
echo $user_id = $_SESSION['id'];
echo '<br>';
if (isset($star) && ($star != '')) {

}

$total_point = 0;
$count = 0;
$i=0;
$query_select = "SELECT * FROM star WHERE technician_id = '$tecinician_id'";
$result_select = mysqli_query($connect, $query_select);
if (mysqli_num_rows($result_select) > 0) {
    while ($row = mysqli_fetch_array($result_select)) {
        $tecinician_id ;
        $row['technician_id'];
        $user_id;
        $row['user_id'];
        if (($tecinician_id == $row['technician_id']) && ($user_id == $row['user_id'])) {
            $query_update_star = "update star set point ='$star' WHERE technician_id = '$tecinician_id' and user_id= '$user_id'";
            $result_update_star = mysqli_query($connect, $query_update_star);
            break;
        }
    }
}

$query_select2 = "SELECT * FROM star WHERE technician_id = '$tecinician_id' and user_id ='$user_id'";
$result_select2 = mysqli_query($connect, $query_select2);
if (mysqli_num_rows($result_select2) > 0) {
    while ( $row = mysqli_fetch_array($result_select2)) {
       echo $row['id'];
    }
}else{
    $query_star = "INSERT INTO star(user_id, technician_id, point) VALUES('$user_id', '$tecinician_id', '$star')";
    mysqli_query($connect, $query_star);
}


$query_select3 = "SELECT * FROM star WHERE technician_id = '$tecinician_id'";
$result_select3 = mysqli_query($connect, $query_select3);
if (mysqli_num_rows($result_select3) > 0) {
    while ( $row = mysqli_fetch_array($result_select3)) {
        $total_point = $total_point + $row['point'];
        $count++;
    }
}

$sum = $total_point / $count;
$query_update_users = "update users set star ='$sum' WHERE id = '$tecinician_id'";
$result_update_users = mysqli_query($connect, $query_update_users);

?>

<script type="text/javascript">
    alert("ให้คะแนนเรียบร้อย")
    window.location.href = 'index.php';
</script>
