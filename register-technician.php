<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<div class="container">
    <div class="container" align="center" style="margin-top: 2%;">
        <form class="form" id="myFrom" method="post" action="register.php?id=2" role="form"
              enctype="multipart/form-data">
            <h2>สมัครสมาชิกช่างผู้ให้บริการ</h2>
            <hr class="style20">

            <div class="container" style="margin-top: 5%">
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
                               id="fileToUpload[]" value="img/1.png" accept="image/*" style="margin-bottom: 20px"/>
                        <img id="blah" src="img/1.png" alt="your image" width="300px" height="auto"/>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="อีเมล์" required
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
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
                            <input type="tel" class="form-control" name="contact" placeholder="เบอร์โทรศัพท์"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="detail" name="detail"
                                      placeholder="รายละเอียด"></textarea>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="card" style="margin-top: 20px">
                            <!-- Default panel contents -->
                            <div class="card-header" style="margin-bottom: 10px">ประเภทช่าง</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    ช่างไฟฟ้า
                                    <label class="switch ">

                                        <!--    ปลี่ยนสีที่ class=""; ด้านล่าง สีดูจาก css/stlye.css-->

                                        <input type="checkbox" class="default" name="type1[1]" id="type1[]"
                                               value="Electrician">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างประปา
                                    <label class="switch ">
                                        <input type="checkbox" class="primary" name="type1[2]" id="type1[]"
                                               value="Plumber">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างสี
                                    <label class="switch ">
                                        <input type="checkbox" class="info" name="type1[3]" id="type1[]"
                                               value="Painter">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างปูน
                                    <label class="switch ">
                                        <input type="checkbox" class="green" name="type1[4]" id="type1[]"
                                               value="Plasterer">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างเหล็ก
                                    <label class="switch ">
                                        <input type="checkbox" class="success" name="type1[5]" id="type1[]"
                                               value="Metalworker">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างไม้
                                    <label class="switch ">
                                        <input type="checkbox" class="warning" name="type1[6]" id="type1[]"
                                               value="Carpenters">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างหลังคา
                                    <label class="switch ">
                                        <input type="checkbox" class="pink" name="type1[7]" id="type1[]"
                                               value="Roof-technician">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    ช่างอิเล็กทรอนิกส์
                                    <label class="switch ">
                                        <input type="checkbox" class="danger" name="type1[8]" id="type1[]"
                                               value="Electronic-technician">
                                        <span class="slider round"></span>
                                    </label>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>

            </div>
            <hr class="style20">
            <label><h3>รูปประสบการณ์ทำงาน</h3></label>
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
            <hr class="style20">
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

    </div>
    <div class="form-group" align="center">
        <input type="submit" class="btn btn-primary" value="สมัครสมาชิก">
    </div>
    </form>
</div>
</body>
</html>

