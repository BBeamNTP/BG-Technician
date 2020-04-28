<?php
require 'header.php';
require 'connection.php';
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
if ((!isset($_SESSION['email']) && ($_SESSION['status'] != "user"))) {
    header('location: login.php');
}
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {


            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['sex'] = $row['sex'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['detail'] = $row['detail'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['avatar_path'] = $row['avatar_path'];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div class="container">
    <div class="container" align="center" style="margin-top: 2%">
        <form action="update-profile.php?user_type=1&id=<?php echo $_SESSION['id']?>&status=<?php echo $_SESSION['status'] ?>" method="post" enctype="multipart/form-data">
            <h2>โปรไฟล์</h2>
            <div class="container" style="margin-top: 5%">
                <div class="row">

                    <div class="col-md-6">
                        <script type="text/javascript">
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#blah').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                        <input class="btn btn-warning" type='file' onchange="readURL(this);" name="fileToUpload[]"
                               accept="image/*" id="fileToUpload[]" style="margin-bottom: 20px"/>
                        <img id="blah" src="<?php echo $_SESSION['avatar_path'] ?>" alt="your image" width="300px"
                             height="auto"/>
                    </div>

                    <div class="col-md-4" style="margin-bottom: 20px; margin-top: 20px">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="อีเมล์" required="true"
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                   value="<?php echo $_SESSION['email'] ?>" disabled>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน"-->
<!--                                   required="true">-->
<!--                        </div>-->
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" placeholder="ชื่อจริง"
                                   value="<?php echo $_SESSION['firstname'] ?>"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" placeholder="นามสกุล"
                                   value="<?php echo $_SESSION['lastname'] ?>"
                                   required="true">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px"> เพศ :&nbsp;
                            <label><input type="radio"
                                          name="sex" <?php if (isset($_SESSION['sex']) && $_SESSION['sex'] == "male") echo "checked"; ?>
                                          value="male" checked> เพศชาย </label>
                            <label><input type="radio"
                                          name="sex" <?php if (isset($_SESSION['sex']) && $_SESSION['sex'] == "female") echo "checked"; ?>
                                          value="female"> เพศหญิง </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="ที่อยู่"
                                   value="<?php echo $_SESSION['address'] ?>"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="contact" placeholder="เบอร์โทรศัพท์"
                                   value="<?php echo $_SESSION['contact'] ?>"
                                   required="true">
                        </div>
<!--                        <div class="form-group">-->
<!--                            <input type="hidden" class="form-control" name="detail" placeholder="รายละเอียด"-->
<!--                                   value="--><?php //echo $_SESSION['detail'] ?><!--"-->
<!--                                   hidden>-->
<!--                        </div>-->
                    </div>

                </div>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <input type="submit" class="btn btn-primary" value="ยืนยันเปลี่ยนแปลงข้อมูล">
            </div>
        </form>
    </div>
</body>
</html>

