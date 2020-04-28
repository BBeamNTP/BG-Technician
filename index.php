<?php
require 'header.php';
require 'connection.php';
@$id = $_GET['id'];
@$value = $_GET['value'];

$perpage = 6;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start = ($page - 1) * $perpage;

if($value==''){
    $sql = "select * from users WHERE status ='technician' limit {$start} , {$perpage} ";
$result = mysqli_query($connect, $sql);
}else{
    $sql = "SELECT us.id, us.firstname, us.lastname, us.avatar_path, us.star
FROM users as us
LEFT JOIN career as cr
ON us.email = cr.email WHERE cr.career_name ='$value'and us.status='technician' limit {$start} , {$perpage}";
    $result = mysqli_query($connect, $sql);
}
$rowcount = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        html, body {
            height: 90%; /* ให้ html และ body สูงเต็มจอภาพไว้ก่อน */
            margin: 0;
            padding: 0;
        }
        .wrapper {
            display: block;
            min-height: 100%; /* real browsers */
            height: auto !important; /* real browsers */
            height: 100%; /* IE6 bug */
            margin-bottom: -20px; /* กำหนด margin-bottom ให้ติดลบเท่ากับความสูงของ footer */
        }
        .footer {
            height: 20px; /* ความสูงของ footer */
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>

<div  class="col-md-12 wrapper" >
    <div class="row wrapper" >
        <div class="col-md-2" style="margin-right: 5%;">
            <h3 align="center">ประเภทช่าง</h3>

            <ul class="nav nav-pills nav-stacked" style="margin-left: 10%; ">
                <li <?php if($id == ""){echo 'class="active"';} ?>><a href="index.php">ทั้งหมด</a></li>
                <li <?php if($id == '1'){echo 'class="active"';} ?>><a href="index.php?id=1&value=Electrician" value="Electrician">ช่างไฟฟ้า</a></li>
                <li <?php if($id == '2'){echo 'class="active"';} ?>><a href="index.php?id=2&value=Plumber" value="Plumber">ช่างประปา</a></li>
                <li <?php if($id == '3'){echo 'class="active"';} ?>><a href="index.php?id=3&value=Painter" value="Painter">ช่างสี</a></li>
                <li <?php if($id == '4'){echo 'class="active"';} ?>><a href="index.php?id=4&value=Plasterer" value="Plasterer">ช่างปูน</a></li>
                <li <?php if($id == '5'){echo 'class="active"';} ?>><a href="index.php?id=5&value=Metalworker" value="Metalworker">ช่างเหล็ก</a></li>
                <li <?php if($id == '6'){echo 'class="active"';} ?>><a href="index.php?id=6&value=Carpenters" value="Carpenters">ช่างไม้</a></li>
                <li <?php if($id == '7'){echo 'class="active"';} ?>><a href="index.php?id=7&value=Roof-technician" value="Roof-technician">ช่างหลังคา</a></li>
                <li <?php if($id == '8'){echo 'class="active"';} ?>><a href="index.php?id=8&value=Electronic-technician" value="Electronic-technician">ช่างอิเล็กทรอนิกส์</a></li>
                <br>
                <form action="equipment-list.php" target ="_blank" >
                    <input type="image" src="img/calculate.jpg" width="150px" height="auto" align="center" name="button"
                           id="button" value="Print" >
                </form>
                <form action="file/contract.pdf" target ="_blank" >
                    <input type="image" src="img/print.jpg" width="150px" height="auto" align="center" name="button"
                           id="button" value="Print" >
                </form>
            </ul>
        </div>
        <?php if ($rowcount == 0) { ?>
        <img class="card-img-top" src="img/no_camera-512.png" alt="Card image cap" width="300px" style="margin-left: 15%;">
        <?php } ?>
<?php while ($row = mysqli_fetch_array($result)) { ?>

    <div class="col-md-3" style="text-align: center; margin-top:2%;" >
            <div class="card" style="width: auto;">
                <img class="card-img-top" src="<?php echo $row['avatar_path']?>" alt="Card image cap" width="150px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['firstname']; echo "\n\n"; echo $row['lastname'];?></h5>

                    <div class="row" style="margin-bottom: 10px">
                        <style>
                            .checked {
                                color: orange;
                            }
                        </style>
                            <span class="fa fa-star <?php if ($row['star']>=1){echo "checked";} ?>"></span>
                            <span class="fa fa-star <?php if ($row['star']>=2){echo "checked";} ?>"></span>
                            <span class="fa fa-star <?php if ($row['star']>=3){echo "checked";} ?>"></span>
                            <span class="fa fa-star <?php if ($row['star']>=4){echo "checked";} ?>"></span>
                            <span class="fa fa-star <?php if ($row['star']>=5){echo "checked";} ?>"></span>

                    </div>
                    <a href="profile-all.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">รายละเอียดช่าง</a>
                </div>
            </div>
        </div>

<?php }
if($value==''){
    $sql2 = "select * from users WHERE status ='technician' ";
    $query2 = mysqli_query($connect, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
}else{
    $sql2 = "SELECT us.id, us.firstname, us.lastname, us.avatar_path, us.star
FROM users as us
LEFT JOIN career as cr
ON us.email = cr.email WHERE cr.career_name ='$value' and us.status='technician'";

    $query2 = mysqli_query($connect, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
}

?>

</div>
    <div class="footer">
            <nav style="margin-left: 18%">
                <ul class="pagination">
                    <li>
                        <a href="index.php?page=1&id=<?php echo $id?>&value=<?php echo $value ?>" aria-label="Previous" <?php if($total_page <1){echo "hidden";}?>>
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for($i=1;$i<=$total_page;$i++){ ?>
                        <li><a href="index.php?page=<?php echo $i; ?>&id=<?php echo $id?>&value=<?php echo $value ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li>
                        <a href="index.php?page=<?php echo $total_page;?>&id=<?php echo $id?>&value=<?php echo $value ?>" aria-label="Next" <?php if($total_page <1){echo "hidden";}?>>
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

    </div>

</body>
<footer>

</footer>
</html>

