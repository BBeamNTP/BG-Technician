<?php
require 'header.php';
require 'connection.php';
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
if ((isset($_SESSION['email']) && ($_SESSION['status'] == "admin"))) {

} elseif ((isset($_SESSION['email']) && ($_SESSION['status'] == "technician"))) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            // เปลี่ยน ข้อมูลใน session เวลา update ข้อมูล
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['sex'] = $row['sex'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['detail'] = $row['detail'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['avatar_path'] = $row['avatar_path'];

            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $sex = $row['sex'];
            $address = $row['address'];
            $contact = $row['contact'];
            $detail = $row['detail'];
            $status = $row['status'];
            $avatar_path = $row['avatar_path'];
        }
    }
} else {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            // เปลี่ยน ข้อมูลใน session เวลา update ข้อมูล
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['sex'] = $row['sex'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['detail'] = $row['detail'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['avatar_path'] = $row['avatar_path'];

            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $sex = $row['sex'];
            $address = $row['address'];
            $contact = $row['contact'];
            $detail = $row['detail'];
            $status = $row['status'];
            $avatar_path = $row['avatar_path'];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div class="container">

    <div class="container" align="center" style="margin-top: 2%;">


            <h2>ข้อมูลส่วนตัวช่าง</h2>
            <div class="col-md-10">
            </div>
            <div class="col-md-2" style="margin-bottom: 20px">
                <form method="post" action="index.php">
                    <input type="submit" class="btn btn-primary" value="กลับสู่หน้าหลัก">
                </form>
            </div>
        <form class="form" id="myFrom" method="post"
              action="update-profile.php?user_type=2&id=<?php echo $id ?>&status=<?php echo $status ?>" role="form"
              enctype="multipart/form-data">
            <div class="container" style="margin-bottom: 5%">

                <div class="row">
                    <div class="col-md-4">
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
                        <img id="blah" src="<?php echo $avatar_path ?>" alt="your image" width="300px"
                             height="auto"/>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>อีเมล</label><input type="email" class="form-control" name="email" placeholder="อีเมล์" required
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $email ?>"
                                   disabled>
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน"-->
                        <!--                                   required="true">-->
                        <!--                        </div>-->
                        <div class="form-group">
                            <label>ชื่อจริง</label> <input type="text" class="form-control" name="firstname" placeholder="ชื่อจริง"
                                   value="<?php echo $firstname ?>"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <label>นามสกุล</label><input type="text" class="form-control" name="lastname" placeholder="นามสกุล"
                                   value="<?php echo $lastname ?>"
                                   required="true">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px"> เพศ :&nbsp;
                            <input type="radio"
                                          name="sex" <?php if (isset($sex) && $sex == "male") echo "checked"; ?>
                                          value="male" checked> เพศชาย </label>
                                            <input type="radio"
                                          name="sex" <?php if (isset($sex) && $sex == "female") echo "checked"; ?>
                                          value="female"> เพศหญิง </label>
                        </div>
                        <div class="form-group">
                            <label>ที่อยู่</label><input type="text" class="form-control" name="address" placeholder="ที่อยู่"
                                   value="<?php echo $address ?>"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label><input type="tel" class="form-control" name="contact" placeholder="เบอร์โทรศัพท์"
                                   value="<?php echo $contact ?>"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <label>รายละเอียดเพิ่มเติม</label><textarea class="form-control" rows="3" name="detail"
                                      placeholder="รายละเอียด"><?php echo $detail ?></textarea>
                        </div>

                    </div>


                    <div class="card col-md-4">
                        <!-- Default panel contents -->
                        <?php
                        $query = "SELECT * FROM career WHERE email = '$email'";
                        $result = mysqli_query($connect, $query);
                        $stack = array();
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                //        $_SESSION['id'] = $row['id'];
                                $type = $row['career_name'];
                                array_push($stack, $type);

                            }
                        }

                        ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                ช่างไฟฟ้า
                                <label class="switch ">

                                    <!--                                        ปลี่ยนสีที่ class=""; ด้านล่าง สีดูจาก css/stlye.css-->

                                    <input type="checkbox" class="default" name="type1[1]" id="type1[]"
                                           value="Electrician" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Electrician") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างประปา
                                <label class="switch ">
                                    <input type="checkbox" class="primary" name="type1[2]" id="type1[]"
                                           value="Plumber" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Plumber") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างสี
                                <label class="switch ">
                                    <input type="checkbox" class="info" name="type1[3]" id="type1[]"
                                           value="Painter" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Painter") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างปูน
                                <label class="switch ">
                                    <input type="checkbox" class="green" name="type1[4]" id="type1[]"
                                           value="Plasterer" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Plasterer") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างเหล็ก
                                <label class="switch ">
                                    <input type="checkbox" class="success" name="type1[5]" id="type1[]"
                                           value="Metalworker" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Metalworker") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างไม้
                                <label class="switch ">
                                    <input type="checkbox" class="warning" name="type1[6]" id="type1[]"
                                           value="Carpenters" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Carpenters") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างหลังคา
                                <label class="switch ">
                                    <input type="checkbox" class="pink" name="type1[7]" id="type1[]"
                                           value="Roof-technician" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Roof-technician") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                ช่างอิเล็กทรอนิกส์
                                <label class="switch ">
                                    <input type="checkbox" class="danger" name="type1[8]" id="type1[]"
                                           value="Electronic-technician" <?php
                                    for ($x = 0; $x <= 8;) {
                                        if (isset($stack[$x]) && $stack[$x] == "Electronic-technician") {
                                            echo "checked";
                                            $x = 8;
                                        }
                                        $x++;
                                    } ?> >
                                    <span class="slider round"></span>
                                </label>
                            </li>

                        </ul>
                    </div>


                </div>
                <hr class="style20">

                <label><h3>รูปประสบการณ์ทำงาน</h3></label>
                <div class="container" align="center">
                    <table width="1080" border="0" align="center" style="margin-top: 3%">
                        <td align="center">

                            <div class="row">
                                <?php
                                //                                $email = $_SESSION['email'];
                                $query = "SELECT * FROM exprience WHERE email = '$email'";
                                $result = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <img class="card-img-top" src="<?php echo $row['path_exprience'] ?>"
                                         alt="Card image cap" width="200px">


                                    <?php
                                }
                                ?>


                            </div>
                            <hr class="style20">

                            <div class="container" align="center">
                                <table width="1080" border="0" align="center" style="margin-top: 3%">
                                    <td align="center">
                                        <div style="margin:auto;width:80%;" align="center">
                                            <div class="form-group">
                                                <div id="thumbnail" align="center"></div>
                                                <br>
                                                <lable class="control-label">Picture :</lable>
                                                <div id="upload" class="btn btn-info">
                                                    Upload File
                                                </div>
                                            </div>
                                            <br>

                                        </div>


                                        <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
                                        <script type="text/javascript">
                                            $(function () {


                                                $("#upload").on("click", function (e) {
                                                    var lastFile = $(".file_upload:last").length;
                                                    if (lastFile >= 0) {
                                                        if (lastFile == 0 || $(".file_upload:last").val() != "") {
                                                            var objFile = $("<input>", {
                                                                "class": "file_upload",
                                                                "type": "file",
                                                                "multiple": "true",
                                                                "name": "file_upload[]",
                                                                "style": "display:none",
                                                                change: function (e) {
                                                                    var files = this.files
                                                                    showThumbnail(files)
                                                                }
                                                            });
                                                            $(this).before(objFile);
                                                            $(".file_upload:last").show().click().hide();
                                                        } else {
                                                            $(".file_upload:last").show().click().hide();
                                                        }
                                                    }
                                                    e.preventDefault();
                                                });

                                                function showThumbnail(files) {

                                                    //    $("#thumbnail").html("");
                                                    for (var i = 0; i < files.length; i++) {
                                                        var file = files[i]
                                                        var fileName = file.name;
                                                        var imageType = /image.*/
                                                        if (!file.type.match(imageType)) {
                                                            //     console.log("Not an Image");
                                                            continue;
                                                        }

                                                        var image = document.createElement("img");
                                                        var wrapImg = document.createElement("div");
                                                        var thumbnail = document.getElementById("thumbnail");
                                                        wrapImg.className = 'removepic';
                                                        wrapImg.setAttribute("data-file", fileName);
                                                        image.file = file;
                                                        wrapImg.appendChild(image);
                                                        thumbnail.appendChild(wrapImg);

                                                        var reader = new FileReader();
                                                        reader.onload = (function (aImg) {
                                                            return function (e) {
                                                                aImg.src = e.target.result;
                                                            };
                                                        }(image))

                                                        var ret = reader.readAsDataURL(file);
                                                        var canvas = document.createElement("canvas");
                                                        ctx = canvas.getContext("2d");
                                                        image.onload = function () {
                                                            ctx.drawImage(image, 100, 100)
                                                        }
                                                    } // end for loop

                                                } // end showThumbnail

                                                // ส่วนจัดการ การลบรูปที่ไม่ต้องการอัพโหลด จากการกดที่
                                                // หรือคลิกที่รูปที่ต้องการลบ

                                                $(document.body).on("click", "div.removepic", function () {
                                                    var removeFileName = $(this).data("file");
                                                    var files = $("input.file_upload");
                                                    var filesLength = files.length;
                                                    for (var f = 0; f < filesLength; f++) {
                                                        var fileLists = files[f].files;
                                                        if (fileLists !== undefined) {
                                                            for (var fl = 0; fl < fileLists.length; fl++) {
                                                                if (fileLists[fl].name === removeFileName) {
                                                                    var removeImg = $("<input>", {
                                                                        "type": "hidden",
                                                                        "name": "remove_file[]",
                                                                        "value": removeFileName
                                                                    });
                                                                    $(files[f]).after(removeImg);
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        ;
                                                    }
                                                    $(this).remove();
                                                });
                                            });
                                        </script>
                                    </td>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>


                                        </td>
                                        <td>&nbsp;</td>

                                    </tr>


                                </table>
                            </div>

                            <hr class="style20">

                            <label><h3>รูปใบรับรองวิชาชีพ</h3></label>
                            <div class="container" align="center">
                                <table width="1080" border="0" align="center" style="margin-top: 3%">
                                    <td align="center">

                                        <div class="row">
                                            <?php
                                            //                                $email = $_SESSION['email'];
                                            $query = "SELECT * FROM certificate WHERE email = '$email'";
                                            $result = mysqli_query($connect, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <img class="card-img-top" src="<?php echo $row['path_certificate'] ?>"
                                                     alt="Card image cap" width="200px">


                                                <?php
                                            }
                                            ?>


                                        </div>
                                        <hr class="style20">

                                        <label><h3>รูปใบรับรองวิชาชีพ</h3></label>
                                        <div class="container" align="center">
                                            <table width="1080" border="0" align="center" style="margin-top: 3%">
                                                <td align="center">
                                                    <div style="margin:auto;width:80%;" align="center">
                                                        <div class="form-group">
                                                            <div id="thumbnail2" align="center"></div>
                                                            <br>
                                                            <lable class="control-label">Picture :</lable>
                                                            <div id="upload2" class="btn btn-info">
                                                                Upload File
                                                            </div>
                                                        </div>
                                                        <br>

                                                    </div>


                                                    <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
                                                    <script type="text/javascript">
                                                        $(function () {


                                                            $("#upload2").on("click", function (e) {
                                                                var lastFile = $(".file_upload2:last").length;
                                                                if (lastFile >= 0) {
                                                                    if (lastFile == 0 || $(".file_upload2:last").val() != "") {
                                                                        var objFile = $("<input>", {
                                                                            "class": "file_upload2",
                                                                            "type": "file",
                                                                            "multiple": "true",
                                                                            "name": "file_upload2[]",
                                                                            "style": "display:none",
                                                                            change: function (e) {
                                                                                var files = this.files
                                                                                showThumbnail2(files)
                                                                            }
                                                                        });
                                                                        $(this).before(objFile);
                                                                        $(".file_upload2:last").show().click().hide();
                                                                    } else {
                                                                        $(".file_upload2:last").show().click().hide();
                                                                    }
                                                                }
                                                                e.preventDefault();
                                                            });

                                                            function showThumbnail2(files) {

                                                                //    $("#thumbnail").html("");
                                                                for (var i = 0; i < files.length; i++) {
                                                                    var file = files[i]
                                                                    var fileName = file.name;
                                                                    var imageType = /image.*/
                                                                    if (!file.type.match(imageType)) {
                                                                        //     console.log("Not an Image");
                                                                        continue;
                                                                    }

                                                                    var image2 = document.createElement("img");
                                                                    var wrapImg2 = document.createElement("div");
                                                                    var thumbnail2 = document.getElementById("thumbnail2");
                                                                    wrapImg2.className = 'removepic';
                                                                    wrapImg2.setAttribute("data-file", fileName);
                                                                    image2.file = file;
                                                                    wrapImg2.appendChild(image2);
                                                                    thumbnail2.appendChild(wrapImg2);

                                                                    var reader = new FileReader();
                                                                    reader.onload = (function (aImg) {
                                                                        return function (e) {
                                                                            aImg.src = e.target.result;
                                                                        };
                                                                    }(image2))

                                                                    var ret = reader.readAsDataURL(file);
                                                                    var canvas = document.createElement("canvas");
                                                                    ctx = canvas.getContext("2d");
                                                                    image2.onload = function () {
                                                                        ctx.drawImage(image2, 100, 100)
                                                                    }
                                                                } // end for loop

                                                            } // end showThumbnail2

                                                            // ส่วนจัดการ การลบรูปที่ไม่ต้องการอัพโหลด จากการกดที่
                                                            // หรือคลิกที่รูปที่ต้องการลบ

                                                            $(document.body).on("click", "div.removepic", function () {
                                                                var removeFileName = $(this).data("file");
                                                                var files = $("input.file_upload2");
                                                                var filesLength = files.length;
                                                                for (var f = 0; f < filesLength; f++) {
                                                                    var fileLists = files[f].files;
                                                                    if (fileLists !== undefined) {
                                                                        for (var fl = 0; fl < fileLists.length; fl++) {
                                                                            if (fileLists[fl].name === removeFileName) {
                                                                                var removeImg = $("<input>", {
                                                                                    "type": "hidden",
                                                                                    "name": "remove_file2[]",
                                                                                    "value": removeFileName
                                                                                });
                                                                                $(files[f]).after(removeImg);
                                                                                break;
                                                                            }
                                                                        }
                                                                    }
                                                                    ;
                                                                }
                                                                $(this).remove();
                                                            });
                                                        });
                                                    </script>
                                                </td>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>


                                                    </td>
                                                    <td>&nbsp;</td>

                                                </tr>


                                            </table>
                                        </div>

        </form>
        <br>
    </div>
    </td>
    <tr>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
    </tr>


    </table></div>


</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="ยืนยันเปลี่ยนแปลงข้อมูล">
</div>
</form>
</div>
</body>
</html>

