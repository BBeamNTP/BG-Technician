<?php
require 'header.php';
$avatar = "img/3.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container" style="text-align: center; padding-top: 5%" >
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="panel panel-primary" style="border: #444444">
                    <div class="panel-heading " style="background-color: #ff8000">
                        <h3>เข้าสู่ระบบ</h3>
                    </div>
                    <div class="panel-body">
                        <img src="<?php echo $avatar ?>" class="img-circle" alt="Cinque Terre">
                        <p>ลงชื่อเข้าใช้เพื่อเข้าสู่ระบบ</p>
                        <form method="post" action="login-submit.php">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="อีเมล์" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน (อย่างน้อย 6 ตัว)" pattern=".{6,}" >
                            </div>
                            <div class="form-group">
                                <input type="submit" value="เข้าสู่ระบบ" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer" style="background-color: rgba(255,128,0,0.45)">ยังไม่ได้เป็นสมาชิกใช่ไหม ? <a href="register-member.php">สมัครสมาชิกทั่วไป</a> || <a href="register-technician.php">สมัครสมาชิกสำหรับช่าง</a></div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

