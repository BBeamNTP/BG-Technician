<?php
require 'header.php';
require 'connection.php';
if ((!isset($_SESSION['email']) && ($_SESSION['status'] != "techinician"))) {
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
    <style>

        .drop-area {
            width: 100px;
            height: 25px;
            border: 1px solid #999;
            text-align: center;
            padding: 10px;
            cursor: pointer;
        }

        #thumbnail, div.removepic {
            display: flex;
            flex-wrap: wrap;
        }

        #thumbnail img {
            width: 100px;
            height: 100px;
            margin: 5px;
        }

        #thumbnail div.removepic:hover {
            display: inline-block;
            border: 1px dashed red;
        }

        canvas {
            border: 1px solid red;
        }
        hr.style19 {
            border-top: 4px solid #000;
        }
        hr.style20 {
            background: url(https://image.ibb.co/gJm5Qv/striped.png);
            height: 5px;
            border: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="container" align="center" style="margin-top: 2%;">
        <form class="form" id="myFrom" method="post" action="update-profile.php?id=2" role="form"
              enctype="multipart/form-data">
            <h2>ข้อมูลส่วนตัวช่าง</h2>
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
                    <div class="col-md-5">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="อีเมล์" required
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['email'] ?>" disabled>
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
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="detail" placeholder="รายละเอียด" ><?php echo $_SESSION['detail'] ?></textarea>
                        </div>

                    </div>

                </div>
                <hr class="style20">

                <label><h3>รูปประสบการณ์ทำงาน</h3></label>
                <div class="container" align="center">
                    <table width="1080" border="0" align="center" style="margin-top: 3%">
                        <!--                  <tr>-->
                        <!--                    <td align="center">-->
                        <!--                        <img id="blah1" src="img/1.png" alt="your image" width="200px" height="auto"/>-->
                        <!--                        <script type="text/javascript">-->
                        <!--                            function readURL1(input) {-->
                        <!--                                if (input.files && input.files[0]) {-->
                        <!--                                    var reader = new FileReader();-->
                        <!---->
                        <!--                                    reader.onload = function (e) {-->
                        <!--                                        $('#blah1').attr('src', e.target.result);-->
                        <!--                                    }-->
                        <!---->
                        <!--                                    reader.readAsDataURL(input.files[0]);-->
                        <!--                                }-->
                        <!--                            }-->
                        <!--                        </script>-->
                        <!--                        <div class="form-group">-->
                        <!--                            <input type="text" class="form-control" name="certificate1" placeholder="หมายเลขใบรับรอง"-->
                        <!--                                   required="true">-->
                        <!--                        </div>-->
                        <!--                        <input class="btn btn-warning" type='file' onchange="readURL1(this);" name="fileToUpload1[1]"-->
                        <!--                               id="fileToUpload1[1]" accept="image/*" style="margin-bottom: 20px"/>-->
                        <!--                    </td>-->

                        <td align="center">

                            <div class="row">
                                <?php
                                $email = $_SESSION['email'];
                                $query = "SELECT * FROM exprience WHERE email = '$email'";
                                $result = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <img class="card-img-top" src="<?php echo $row['path_exprience'] ?>" alt="Card image cap" width="200px">

<!---->
<!--                                    <div class="col-md-3" style="text-align: center; margin-bottom: 2%;" >-->
<!--                                        <div class="card" style="width: auto;">-->
<!--                                            <img class="card-img-top" src="--><?php //echo $row['path_exprience'] ?><!--" alt="Card image cap" width="200px">-->
<!--                                            <div class="card-body">-->
<!--                                                <h5 class="card-title">--><?php //echo $row['firstname']; echo "\n\n"; echo $row['lastname'];?><!--</h5>-->
<!--                                                <a href="#" class="btn btn-primary">รายละเอียดช่าง</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                            <?php
                                }
                                ?>


                            </div>
                            <hr class="style20">

                            <div style="margin:auto;width:80%;">
                                <!--                            <h3> บันทึกข้อมูล</h3>-->
                                <!--                            <form class="form" id="myFrom" method="post" action="show_data.php"  role="form" enctype="multipart/form-data">-->
                                <!--                                <div class="form-group">-->
                                <!--                                    <lable class="control-label">Name : </lable>-->
                                <!--                                    <input type="text" autocomplete="off" class="form-control" name="name">-->
                                <!--                                </div>-->
                                <div class="form-group">
                                    <h4>รูปใหม่</h4>
                                    <div id="thumbnail" align="center"></div>
                                    <br>
                                    <lable class="control-label">Picture :</lable>
                                    <div id="upload" class="btn btn-info">
                                        Upload File
                                    </div>
                                </div>
                                <!--                                <button type="submit"  class="btn btn-primary">เพิ่มข้อมูล</button>-->
        </form>
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


    <!--                        <img id="blah2" src="img/1.png" alt="your image" width="200px" height="auto"/>-->
    <!--                        <script type="text/javascript">-->
    <!--                            function readURL2(input) {-->
    <!--                                if (input.files && input.files[0]) {-->
    <!--                                    var reader = new FileReader();-->
    <!---->
    <!--                                    reader.onload = function (e) {-->
    <!--                                        $('#blah2').attr('src', e.target.result);-->
    <!--                                    }-->
    <!---->
    <!--                                    reader.readAsDataURL(input.files[0]);-->
    <!--                                }-->
    <!--                            }-->
    <!--                        </script>-->
    <!--                        <div class="form-group">-->
    <!--                            <input type="text" class="form-control" name="certificate2" placeholder="หมายเลขใบรับรอง"-->
    <!--                                   required="true">-->
    <!--                        </div>-->
    <!--                        <input class="btn btn-warning" type='file' onchange="readURL2(this);" name="fileToUpload2[1]"-->
    <!--                               id="fileToUpload2[1]" accept="image/*" style="margin-bottom: 20px"/>-->
    </td>


    <!--                      <td align="center">-->
    <!--                          <img id="blah3" src="img/1.png" alt="your image" width="200px" height="auto"/>-->
    <!--                          <script type="text/javascript">-->
    <!--                              function readURL3(input) {-->
    <!--                                  if (input.files && input.files[0]) {-->
    <!--                                      var reader = new FileReader();-->
    <!---->
    <!--                                      reader.onload = function (e) {-->
    <!--                                          $('#blah3').attr('src', e.target.result);-->
    <!--                                      }-->
    <!---->
    <!--                                      reader.readAsDataURL(input.files[0]);-->
    <!--                                  }-->
    <!--                              }-->
    <!--                          </script>-->
    <!--                          <div class="form-group">-->
    <!--                              <input type="text" class="form-control" name="certificate3" placeholder="หมายเลขใบรับรอง"-->
    <!--                                     required="true">-->
    <!--                          </div>-->
    <!--                          <input class="btn btn-warning" type='file' onchange="readURL3(this);" name="fileToUpload3[1]"-->
    <!--                                 id="fileToUpload3[1]" accept="image/*" style="margin-bottom: 20px"/>-->
    <!--                      </td>-->
    <!---->
    <!--                  </tr>-->
    <tr>
        <td>&nbsp;</td>
        <td>


        </td>
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

