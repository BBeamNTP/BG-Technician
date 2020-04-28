<?php
require 'header.php';
require 'connection.php';
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
$user_id = $_SESSION['id'];
$sql = "select * from equipment WHERE user_id ='$user_id' ";
$result = mysqli_query($connect, $sql);
$sum = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style-admin.css" type="text/css">
    <style>
        @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

        .detailBox {
            width: 100%;
            height: 55%;
            border: 0px solid #bbb;

        }

        .titleBox label {
            color: #444;
            margin: 0;
            display: inline-block;
        }

        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width: 80%;
        }

        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width: 18%;
        }

        .actionBox .form-group * {
            width: 100%;
        }

        .commentList {
            padding: 0;
            list-style: none;
            max-height: 95%;
            max-width: 100%;
            overflow: auto;
        }
        .commentLis2 {
            padding: 0;
            list-style: none;
            max-height: 100%;
            max-width: 100%;
            overflow: auto;
        }

        .commentList li {
            margin: 0;
            margin-top: 10px;
        }

        .commentList li > div {
            display: table-cell;
        }

        .commenterImage img {
            width: 100%;
            border-radius: 50%;
        }

        .commentText p {
            margin: 0;
        }

        .actionBox {
            border-top: 1px dotted #bbb;
            padding: 10px;
        }
    </style>

</head>
<body>
<div class="container">

    <h2>คำนวนราคาวัสดอุปกรณ์ เบื้องต้น</h2><br>
    <div align="center">
        <ul class="commentLis2" >
            <form action="add-list.php?method=add" method="post">
                <div class="col-xs-4">
                    <label >ชื่อรายการ</label>
                    <input class="form-control" id="ex3" type="text" name="eq_name">
                </div>
                <div class="col-xs-2">
                    <label >จำนวน</label>
                    <input class="form-control" id="ex1" type="text" name="amount">
                </div>
                <div class="col-xs-2">
                    <label>ราคา/ชิ้น</label>
                    <input class="form-control" id="ex1" type="text" name="price">
                </div>

                <div class="col-xs-1" style="padding-top: 24px; margin-left:55px ">
                    <button class="btn btn-success" type="submit" name="submit">เพิ่มรายการ</button>
                </div>
                <div class="col-xs-1" style="padding-top: 24px">
                    <a class="btn btn-danger" href="add-list.php?id=<?php echo $_SESSION['id']?>&method=<?php echo $value = "del"?>'" onClick="return confirm('คุณต้องการที่จะลบทั้งหมด ใช่หรือไม่');">ลบทั้งหมด</a>
                </div>
                <div class="col-xs-1" style="padding-top: 24px">
                    <a class="btn btn-info" href="index.php">กลับสู่หน้าหลัก</a>
                </div>
            </form>

        </ul>
    </div>

    <div class="detailBox">
        <div class="actionBox">
            <ul class="commentList">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr style="color: white; background-color:#ff8000;">
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">รายการ</th>
                            <th style="text-align: center">ราคา</th>
                            <th style="text-align: center">จำนวน</th>
                            <th style="text-align: center">ราคารวม</th>
                            <th></th>
                        </tr>
                        <?php
                        $counter = 1;

                        while ($row = mysqli_fetch_array($result)) { ?>
                            <tr class="<?php if (($counter % 2) == 0) {
                                echo "default";
                            } else {
                                echo "warning";
                            } ?>">
                                <th style="text-align: center" width="10%" style="text-align: center"><?php echo $counter ?></th>
                                <th style="text-align: center" width="25%"><?php echo $row['item']; ?></th>
                                <th style="text-align: center" width="15%"><?php echo $row['price']; ?></th>
                                <th style="text-align: center" width="15%"><?php echo $row['amount']; ?></th>
                                <th style="text-align: center" width="15%"><?php echo $row['total_price']; ?></th>
                                <th width="10%" align="center"><a class="btn btn-danger"
                                                                 href="add-list.php?item_id=<?php echo $row['id']; ?>&method=del-1"
                                                                 onClick="return confirm('คุณต้องการที่จะลบผู้ใช้ ท่านนี้ ใช่หรือไม่');">ลบ</a>
                                </th>
                            </tr>
                            <?php $counter = $counter + 1;
                            $sum = $sum + $row['total_price'];
                        } ?>
                        </tbody>
                    </table>

                </div>

            </ul>

        </div>
    </div>
    <div class="container">

    </div>

    <div class="container">
        <div class="panel panel-default" align="center">
            <div class="panel-body"><h3><?php echo "ราคารวมเบื้องต้นทั้งหมด คือ ". $sum . " บาท"?></h3></div>
        </div>
    </div>

</div>

</body>
<footer>

</footer>
</html>

