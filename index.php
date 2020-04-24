<?php
require 'header.php';
require 'connection.php';

$sql = "select * from users WHERE status ='techinician'";
$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div style="margin-left: 5%; margin-right: 5%; ">
    <div class="row">
        <div class="col-md-2" style="margin-right: 5%;margin-top: -1%; margin-bottom: 100%">
            <h3>ประเภทช่าง</h3>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">ทั้งหมด</a></li>
                <li><a href="#">ช่างประปา</a></li>
                <li><a href="#">ช่างไฟฟ้า</a></li>
                <li><a href="#">ช่างสี</a></li>
                <li><a href="#">ช่างหลังคา</a></li>
                <li><a href="#">ช่างแอร์</a></li>
                <li><a href="#">ช่างหลังคาบ้าน</a></li>
                <li><a href="#">งานปูทั้งหมด</a></li>
                <li><a href="#">งานไม้ทั้งหมด</a></li>
                <li><a href="#">ช่างอิเล็กทรอนิกส์</a></li>
                <li><a href="#">ช่างเฟอร์นิเจอร์</a></li>
            </ul>
        </div>

<?php while ($row = mysqli_fetch_array($result)) { ?>

    <div class="col-md-3" style="text-align: center; margin-bottom: 2%;" >
            <div class="card" style="width: auto;">
                <img class="card-img-top" src="<?php echo $row['avatar_path']?>" alt="Card image cap" width="200px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['firstname']; echo "\n\n"; echo $row['lastname'];?></h5>
                    <a href="#" class="btn btn-primary">รายละเอียดช่าง</a>
                </div>
            </div>
        </div>

<?php } ?>
</div>
</body>
</html>

