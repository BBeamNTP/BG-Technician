<?php
require 'header.php';
require 'connection.php';
@$str = $_POST['test'];
if ($str == 'fixed'){
    $query = "SELECT * FROM users WHERE status = 'fixed'";
    $result = mysqli_query($connect, $query);
}else if ($str == 'wait-fix'){
    $query = "SELECT * FROM users WHERE status = 'wait-fix'";
    $result = mysqli_query($connect, $query);
}else if ($str == 'wait'){
    $query = "SELECT * FROM users WHERE status = 'wait'";
    $result = mysqli_query($connect, $query);
}else if ($str == 'user'){
    $query = "SELECT * FROM users WHERE status = 'user'";
    $result = mysqli_query($connect, $query);
}else{
    $query = "SELECT * FROM users WHERE status='technician'";
    $result = mysqli_query($connect, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: sans-serif;
        }
        /*
        ให้ element ที่มี class img-checker ถูกซ่อนไว้
        */
        .img-checker {
            display: none;
        }
        /*
        ให้ <img> ที่ตามหลัง element ที่มี class img-checker แสดงผลแบบจาง
        และใช้ cursor รูปมือเมื่อผู้ใช้เอาเมาส์ไปชี้
        */
        .img-checker + img {
            opacity: 0.5;
            cursor: pointer;
            width: 150px;
        }
        /*
        ให้ <img> ที่ตามหลัง element ที่มี class img-checker กลับมาแสดงผลแบบปกติ
        เมื่อ element ที่มี class img-checker มีสถานะเป็น checked
        */
        .img-checker:checked + img {
            opacity: 1.0;
        }


    </style>
</head>
<body>
    <div class="container">

        <h2>รายชื่อผู้สมัครชื่อทั้งหมด</h2><br>
        <div align="center">

            <form name="form"action="admin-index.php" method="post">
                <label>
                    <input type="radio" name="test" value="technician" id="1" class="img-checker" <?php if(($str == 'technician')|| ($str == "")){echo 'checked';}?> >
                    <img src="img/pass.jpg">
                </label>
                <label>
                    <input type="radio" name="test" value="fixed" id="2" class="img-checker" <?php if($str == 'fixed'){echo 'checked';}?> >
                    <img src="img/wait-2.jpg">
                </label>
                <label>
                    <input type="radio" name="test" value="wait-fix" id="3" class="img-checker" <?php if($str == 'wait-fix'){echo 'checked';}?> >
                    <img src="img/wait.jpg">
                </label>
                <label>
                    <input type="radio" name="test" value="wait"  id="4" class="img-checker" <?php if($str == 'wait'){echo 'checked';}?> >
                    <img src="img/not.jpg">
                </label>
                <label>
                    <input type="radio" name="test" value="user"  id="5" class="img-checker" <?php if($str == 'user'){echo 'checked';}?> >
                    <img src="img/user.jpg">
                </label>

                <script type='text/javascript'>

                    $(document).ready(function() {
                        $('input[name=test]').change(function(){
                            $('form').submit();
                        });
                    });

                </script>
            </form>

        </div>
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
                    <th width="4%" align="center"><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>" onClick="return confirm('คุณต้องการที่จะลบผู้ใช้ ท่านนี้ ใช่หรือไม่');">ลบ</a></th>

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

