<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
        .drop-area{
            width:100px; height:25px;
            border: 1px solid #999; text-align: center;
            padding:10px; cursor:pointer;
        }
        #thumbnail,div.removepic{
            display: flex;
            flex-wrap: wrap;
        }
        #thumbnail img{width:100px;height:100px;margin:5px;}
        #thumbnail div.removepic:hover{
            display:inline-block;
            border:1px dashed red;
        }
        canvas{border:1px solid red;}
    </style>
</head>
<body>

<div class="container">
    <div class="container" align="center" style="margin-top: 2%; s">
        <form action="register.php?id=2" method="post" enctype="multipart/form-data">
                <h2>สมัครสมาชิกช่างผู้ให้บริการ</h2>
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
                                <input class="btn btn-warning" type='file' onchange="readURL(this);" name="fileToUpload"  id="fileToUpload" style="margin-bottom: 20px"/>
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
                                <input type="tel" class="form-control" name="contact" placeholder="เบอร์โทรศัพท์"
                                       required="true">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="detail" placeholder="รายละเอียด"
                                       hidden>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="certificate" placeholder="หมายเลขใบรับรอง"
                                       required="true">
                            </div>



                        </div>
                        <div class="col-md-4">
                            <script type="text/javascript">
                                function readURL2(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#blah2').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <input class="btn btn-warning" type='file' onchange="readURL2(this);" name="fileToUpload2" id="fileToUpload2" multiple="true" style="margin-bottom: 20px"/>
                            <img id="blah2" src="img/1.png" alt="your image" width="300px" height="auto"/>

                        </div>



<!--                        <div style="margin:auto;width:80%;">-->
<!--                            <h3> บันทึกข้อมูล</h3>-->
<!--                            <form class="form" id="myFrom" method="post" action="show_data.php"  role="form" enctype="multipart/form-data">-->
<!--                                <div class="form-group">-->
<!--                                    <lable class="control-label">Name : </lable>-->
<!--                                    <input type="text" autocomplete="off" class="form-control" name="name">-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <lable class="control-label">Picture : </lable>-->
<!--                                    <div id="upload" class="btn btn-info">-->
<!--                                        Upload File-->
<!--                                    </div>-->
<!--                                    <div id="thumbnail"></div>-->
<!--                                </div>-->
<!--                                <button type="submit"  class="btn btn-primary">เพิ่มข้อมูล</button>-->
<!--                            </form>-->
<!--                            <br>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>-->
<!--                        <script type="text/javascript" >-->
<!--                            $(function () {-->
<!---->
<!---->
<!--                                $("#upload").on("click",function(e){-->
<!--                                    var lastFile = $(".file_upload:last").length;-->
<!--                                    if(lastFile >= 0){-->
<!--                                        if(lastFile == 0 || $(".file_upload:last").val()!=""){-->
<!--                                            var objFile= $("<input>",{-->
<!--                                                "class":"file_upload",-->
<!--                                                "type":"file",-->
<!--                                                "multiple":"true",-->
<!--                                                "name":"file_upload[]",-->
<!--                                                "style":"display:none",-->
<!--                                                change: function(e){-->
<!--                                                    var files = this.files-->
<!--                                                    showThumbnail(files)-->
<!--                                                }-->
<!--                                            });-->
<!--                                            $(this).before(objFile);-->
<!--                                            $(".file_upload:last").show().click().hide();-->
<!--                                        }else{-->
<!--                                            $(".file_upload:last").show().click().hide();-->
<!--                                        }-->
<!--                                    }-->
<!--                                    e.preventDefault();-->
<!--                                });-->
<!---->
<!--                                function showThumbnail(files){-->
<!---->
<!--                                    //    $("#thumbnail").html("");-->
<!--                                    for(var i=0;i<files.length;i++){-->
<!--                                        var file = files[i]-->
<!--                                        var fileName = file.name;-->
<!--                                        var imageType = /image.*/-->
<!--                                        if(!file.type.match(imageType)){-->
<!--                                            //     console.log("Not an Image");-->
<!--                                            continue;-->
<!--                                        }-->
<!---->
<!--                                        var image = document.createElement("img");-->
<!--                                        var wrapImg = document.createElement("div");-->
<!--                                        var thumbnail = document.getElementById("thumbnail");-->
<!--                                        wrapImg.className = 'removepic';-->
<!--                                        wrapImg.setAttribute("data-file", fileName);-->
<!--                                        image.file = file;-->
<!--                                        wrapImg.appendChild(image);-->
<!--                                        thumbnail.appendChild(wrapImg);-->
<!---->
<!--                                        var reader = new FileReader();-->
<!--                                        reader.onload = (function(aImg){-->
<!--                                            return function(e){-->
<!--                                                aImg.src = e.target.result;-->
<!--                                            };-->
<!--                                        }(image))-->
<!---->
<!--                                        var ret = reader.readAsDataURL(file);-->
<!--                                        var canvas = document.createElement("canvas");-->
<!--                                        ctx = canvas.getContext("2d");-->
<!--                                        image.onload= function(){-->
<!--                                            ctx.drawImage(image,100,100)-->
<!--                                        }-->
<!--                                    } // end for loop-->
<!---->
<!--                                } // end showThumbnail-->
<!---->
<!--                                // ส่วนจัดการ การลบรูปที่ไม่ต้องการอัพโหลด จากการกดที่-->
<!--                                // หรือคลิกที่รูปที่ต้องการลบ-->
<!--                                $(document.body).on("click","div.removepic",function(){-->
<!--                                    var removeFileName = $(this).data("file");-->
<!--                                    var files = $("input.file_upload");-->
<!--                                    var filesLength = files.length;-->
<!--                                    for(var f = 0; f < filesLength; f++){-->
<!--                                        var fileLists = files[f].files;-->
<!--                                        if(fileLists !== undefined){-->
<!--                                            for(var fl = 0; fl < fileLists.length; fl++){-->
<!--                                                if(fileLists[fl].name === removeFileName) {-->
<!--                                                    var removeImg = $("<input>",{-->
<!--                                                        "type":"hidden",-->
<!--                                                        "name":"remove_file[]",-->
<!--                                                        "value":removeFileName-->
<!--                                                    });-->
<!--                                                    $(files[f]).after(removeImg);-->
<!--                                                    break;-->
<!--                                                }-->
<!--                                            }-->
<!--                                        };-->
<!--                                    }-->
<!--                                    $(this).remove();-->
<!--                                });-->
<!---->
<!---->
<!--                            });-->
<!--                        </script>-->




                    </div>
                </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="สมัครสมาชิก">
            </div>
        </form>
    </div>
</body>
</html>

