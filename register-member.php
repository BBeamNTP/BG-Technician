<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div class="container">
    <div class="container" align="center" style="margin-top: 2%">
        <form action="register.php?id=1" method="post" enctype="multipart/form-data">
            <h2>สมัครสมาชิกช่างผู้ให้บริการ</h2>
            <hr class="style20">
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
                        <input class="btn btn-warning" type='file' onchange="readURL(this);" name="fileToUpload" accept="image/*" id="fileToUpload" style="margin-bottom: 20px"/>
                        <img id="blah" src="img/1.png" alt="your image" width="300px" height="auto"/>

                    </div>
                    <div class="col-md-4" style="margin-bottom: 20px; margin-top: 20px">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="อีเมล์" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" placeholder="ชื่อจริง"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" placeholder="นามสกุล"
                                   required="true">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px"> เพศ :&nbsp;
                            <label><input type="radio" name="sex" value="male" checked> เพศชาย </label>
                            <label><input type="radio" name="sex" value="female"> เพศหญิง </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="ที่อยู่"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="contact" placeholder="เบอร์โทรศัพท์"
                                   required="true">
                        </div>
<!--                        <div class="form-group">-->
<!--                            <input type="hidden" class="form-control" name="detail" placeholder="รายละเอียด"-->
<!--                                   hidden>-->
<!--                        </div>-->
                    </div>

                </div>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <input type="submit" class="btn btn-primary" value="สมัครสมาชิก">
            </div>
        </form>
    </div>
</body>
</html>

