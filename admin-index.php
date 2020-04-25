<?php
require 'header.php';
require 'connection.php';

$query = "SELECT * FROM users WHERE status = 'wait'";
$result = mysqli_query($connect, $query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container">

        <h3>รายชื่อผู้สมัครชี่งทั้งหมด</h3><br>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เบอร์โทร</th>
                <th>-</th>
                <th>-</th>
            </tr>
            <?php
            $counter = 1;
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th width="5%" style="text-align: center"><?php echo $counter ?></th>
                    <th width="25%"><?php echo $row['firstname']; ?></th>
                    <th width="25%"><?php echo $row['lastname']; ?></th>
                    <th width="25%"><?php echo $row['contact']; ?></th>
                    <th width="16%" align="center"><a href="profile-all.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">รายละเอียดเพิ่มเติม</a></th>
                    <th width="4%" align="center"><button class="info" type="submit" name="sumbit">ลบ</button> </th>
                </tr>
                <?php $counter = $counter + 1;
            } ?>

            </tbody>
        </table>


    </div>

</body>
<footer>

</footer>
</html>

