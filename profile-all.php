<?php
require 'header.php';
require 'connection.php';
if ((!isset($_SESSION['email']))) {
    header('location: login.php');
}

$id = $_GET['id'];
$active = "home";
@$active = $_GET['active'];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

//        $user_id = $row['id'];
        $email = $row['email'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $sex = $row['sex'];
        $address = $row['address'];
        $contact = $row['contact'];
        $detail = $row['detail'];
        $status = $row['status'];
        $avatar_path = $row['avatar_path'];
        $star = $row['star'];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

        .detailBox {
            width: 100%;
            height: 55%;
            border: 1px solid #bbb;
        }

        .titleBox {
            background-color: #fdfdfd;
            padding: 10px;
        }

        .titleBox label {
            color: #444;
            margin: 0;
            display: inline-block;
        }

        .commentBox {
            padding: 10px;
            border-top: 1px dotted #bbb;
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

        .taskDescription {
            margin-top: 5px;
        }

        .commentList {
              padding: 0;
              list-style: none;
              max-height: 75%;
              max-width: 100%;
              overflow: auto;
          }
        .commentLis3 {

            padding: 0;
            list-style: none;
            max-height: 80%;
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

        .commenterImage {
            width: 30px;
            margin-right: 5px;
            height: 100%;
            float: left;
        }

        .commenterImage img {
            width: 100%;
            border-radius: 50%;
        }

        .commentText p {
            margin: 0;
        }

        .sub-text {
            color: #aaa;
            font-family: verdana;
            font-size: 11px;
        }

        .actionBox {
            border-top: 1px dotted #bbb;
            padding: 10px;
        }

    </style>
    <META HTTP-EQUIV="REFRESH" CONTENT="30">
    <?php //<META HTTP-EQUIV="REFRESH" CONTENT="5">REFRESH ทุก 5 วินาที ?>
    <title>Untitled Document</title>
</head>
<body>

<div class="container">
    <div class="container" align="center" style="margin-top: 5px;">
        <h2>ข้อมูลส่วนตัวช่าง</h2><br>
        <div class="container">

            <?php if ((isset($_SESSION['email']) && ($_SESSION['status'] == "admin"))) { ?>
                <div class="col-md-3" style="margin-top: 8px">
                    <!--                    <form method="get" action="index.php">-->
                    <!-- Material unchecked disabled -->
                    <li>สถานะตรวจสอบ ไม่ผ่าน/ผ่าน
                        <label class="switch">
                            <input type="checkbox" class="primary" name="type1" id="type1" value="technician"
                                   onclick="window.location='admin-change-status.php?id=<?php echo $id ?>&status=<?php echo $status ?>'"
                                <?php
                                if ($status == "technician") {
                                    echo "checked";
                                } else if ($status == "user") {
                                    echo "disabled";
                                } else {
                                    echo "error";
                                }
                                ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>

                    <!--                    </form>-->
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <?php if (isset($status) && $status == "wait") { ?>
                        <form method="post"
                              action="wait-status.php?id=<?php echo $id ?>&email=<?php echo $email ?>&status=<?php echo $status ?>">
                            <input type="submit" class="btn btn-primary" value="แจ้งแก้ไข">
                        </form>
                    <?php } else if (isset($status) && (($status == "fixed") || ($status == "wait-fix"))) { ?>
                        <form method="post"
                              action="wait-status.php?id=<?php echo $id ?>&email=<?php echo $email ?>&status=<?php echo $status ?>">
                            <input type="submit" class="btn btn-primary" value="แจ้งแก้ไข อีกครั้ง">
                        </form>
                    <?php } else { ?>
                        <input type="submit" class="btn btn-primary" value="แจ้งแก้ไข อีกครั้ง" disabled>

                    <?php } ?>
                </div>
                <div class="col-md-2">
                    <form method="post" action="admin-index.php">
                        <input type="submit" class="btn btn-primary" value="กลับสู่หน้าหลัก">
                    </form>
                </div>
            <?php } else { ?>
                <div class="col-md-7"></div>
                <div class="col-md-3" style="margin-top: 8px">
                    <form method="get" action="index.php">
                        <!-- Material unchecked disabled -->
                        <li>สถานะตรวจสอบ รอ/ผ่าน
                            <label class="switch">
                                <input type="checkbox" class="primary" name="type1[2]" id="type1[]"
                                       value="technician" <?php
                                if (isset($status) && $status == "technician") {
                                    echo "checked";
                                }
                                ?> disabled>
                                <span class="slider round"></span>
                            </label>
                        </li>

                    </form>
                </div>
                <div class="col-md-2">

                    <form method="get" action="index.php">
                        <input type="submit" class="btn btn-primary" value="กลับสู่หน้าหลัก">
                    </form>
                </div>

            <?php } ?>


        </div>
        <div class="container" style="margin-top: -3%;">
            <div class="container">
                <ul class="nav nav-tabs">
                    <?php if ($status == "user") { ?>
                        <li class="active"><a data-toggle="tab" href="#home">ข้อมูลส่วนตัวช่าง</a></li>
                    <?php } else { ?>
                        <!--                    -------------------------------------------------------------------------------------------ข้อมูลส่วนตัวช่าง------------------------------->

                        <li class="<?php if (($active == "home") || ($active == "")) {
                            echo "active";
                        } ?>"><a data-toggle="tab" href="#home">ข้อมูลส่วนตัวช่าง</a></li>
                        <!--                    -------------------------------------------------------------------------------------------ประเภทงานที่ทำ------------------------------->

                        <li><a data-toggle="tab" href="#menu1">ประเภทงานที่ทำ</a></li>
                        <!--                    -------------------------------------------------------------------------------------------รูปประสบการณ์ทำงาน------------------------------->

                        <li><a data-toggle="tab" href="#menu2">รูปประสบการณ์ทำงาน</a></li>
                        <!--                    -------------------------------------------------------------------------------------------ใบรับรองอาวิชาชีพ------------------------------->

                        <li><a data-toggle="tab" href="#menu3">ใบรับรองอาวิชาชีพ</a></li>
                        <!--                    -------------------------------------------------------------------------------------------แสดงความคิดเห็น------------------------------->

                        <li class=" <?php if ($active == "comment") {
                            echo "active";
                        } ?>"><a data-toggle="tab" href="#menu4">แสดงความคิดเห็น</a></li>
                        <!--                    -------------------------------------------------------------------------------------------สนทนาข้อความ------------------------------->
                        <?php if ((($_SESSION['status'] != 'technician') && ($row['status'] != 'technician')) || (($_SESSION['status'] == 'admin')&&($row['status'] == 'technician'))) { ?>
                        <li class=" <?php if ($active == "chat") {
                            echo "active";
                        } ?>"><a data-toggle="tab" href="#menu5" >สนทนาข้อความ</a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <div class="tab-content" style="margin-top: 50px">
                    <!--                    -------------------------------------------------------------------------------------------ข้อมูลส่วนตัวช่าง------------------------------->

                    <div id="home" class="tab-pane fade <?php if (($active == "home") || ($active == "")) {
                        echo "in active";
                    } ?>">
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
                                <img id="blah" src="<?php echo $avatar_path ?>" alt="your image" width="300px"
                                     height="auto"/>

                                <style>
                                    .star-rating {
                                        line-height: 32px;
                                        font-size: 1.25em;
                                    }

                                    .star-rating .fa-star {
                                        color: orange;
                                    }
                                </style>
                                <form action="star-point.php?id=<?php echo $id ?>&" method="post">
                                    <h2>Star Rating</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="star-rating">
                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                <input type="hidden" name="whatever1" class="rating-value"
                                                       value="<?php echo $star ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit" name="submit" value="ให้ดาว">ให้ดาว
                                    </button>
                                </form>
                                <script type="text/javascript">


                                    var $star_rating = $('.star-rating .fa');

                                    var SetRatingStar = function () {
                                        return $star_rating.each(function () {
                                            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                                                return $(this).removeClass('fa-star-o').addClass('fa-star');
                                            } else {
                                                return $(this).removeClass('fa-star').addClass('fa-star-o');
                                            }
                                        });
                                    };

                                    $star_rating.on('click', function () {
                                        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
                                        return SetRatingStar();
                                    });

                                    SetRatingStar();
                                    $(document).ready(function () {

                                    });
                                </script>


                            </div>
                            <div class="col-md-6" style="margin-top: 40px">

                                <div class="form-group">
                                    <h5>อีเมล : <?php echo $email ?></h5>
                                </div>
                                <div class="form-group">
                                    <h5>ชื่อ : <?php echo $firstname ?></h5>
                                </div>
                                <div class="form-group">
                                    <h5>นามสกุล : <?php echo $lastname ?></h5>
                                </div>
                                <div class="form-group">
                                    <h5>เพศ : <?php if ($sex == "male") {
                                            echo "ชาย";
                                        } elseif ($sex == "female") {
                                            echo "หญิง";
                                        } else {
                                            echo "ไม่ระบุ";
                                        } ?></h5>
                                </div>
                                <div class="form-group">
                                    <h5>ที่อยู่ : <?php echo $address ?></h5>
                                </div>
                                <div class="form-group">
                                    <h5>ติดต่อ : <?php echo $contact ?></h5>
                                </div>
                                <div class="form-group">
                                    <h5>รายละเอียด : <?php echo $detail ?></h5>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!--                    -------------------------------------------------------------------------------------------ประเภทงานที่ทำ------------------------------->

                    <div id="menu1" class="tab-pane fade">
                        <div class="card" style="margin-top: 20px">
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
                            <ul class="list-group list-group-flush" style="margin-left: 30%; margin-right: 30%;">
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
                                        } ?> disabled>
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
                                        } ?> disabled>
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
                                        } ?> disabled>
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
                                        } ?> disabled>
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
                                        } ?> disabled>
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
                                        } ?> disabled>
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
                                        } ?> disabled>
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
                                        } ?> disabled>
                                        <span class="slider round"></span>
                                    </label>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <!--                    -------------------------------------------------------------------------------------------รูปประสบการณ์ทำงาน------------------------------->

                    <div id="menu2" class="tab-pane fade">
                        <div class="container" align="center">
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM exprience WHERE email = '$email'";
                                $result = mysqli_query($connect, $query);
                                $rowcount = mysqli_num_rows($result);      // ดูจำนวน ใน row
                                if ($rowcount == 0) {
                                    ?>
                                    <img class="card-img-top" src="img/no_camera-512.png"
                                         alt="Card image cap" width="350" height="auto"
                                         style="margin-top: 10px; border: 20px solid #ffffff; ">
                                    <?php
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                        <img class="card-img-top" src="<?php echo $row['path_exprience'] ?>"
                                             alt="Card image cap" width="350" height="auto"
                                             style="margin-top: 10px; border: 20px solid #ffffff; ">
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <br>
                        </div>
                    </div>

                    <!--                    -------------------------------------------------------------------------------------------ใบรับรองอาวิชาชีพ------------------------------->

                    <div id="menu3" class="tab-pane fade">
                        <div class="container" align="center">
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM certificate WHERE email = '$email'";
                                $result = mysqli_query($connect, $query);
                                $rowcount = mysqli_num_rows($result);      // ดูจำนวน ใน row
                                if ($rowcount == 0) {
                                    ?>
                                    <img class="card-img-top" src="img/no_camera-512.png"
                                         alt="Card image cap" width="350" height="auto"
                                         style="margin-top: 10px; border: 20px solid #ffffff; ">
                                    <?php
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                        <img class="card-img-top" src="<?php echo $row['path_certificate'] ?>"
                                             alt="Card image cap" width="350" height="auto"
                                             style="margin-top: 10px; border: 20px solid #ffffff; ">
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <br>
                        </div>


                    </div>

                    <!--                    -------------------------------------------------------------------------------------------แสดงความคิดเห็น------------------------------->

                    <div id="menu4" class="tab-pane fade <?php if ($active == "comment") {
                        echo "in active";
                    } ?>">
                        <div class="detailBox">
                            <div class="titleBox">
                                <label>แสดงความคิดเห็น</label>
                                <button type="button" class="close" aria-hidden="true">&times;</button>
                            </div>
                            <div class="actionBox">
                                <ul class="commentList" id="commentList">
                                    <?php
                                    $count = 0;
                                    $sql2 = "SELECT cm.id, cm.technician_id, cm.user_id, cm.text ,cm.date, us.firstname, us.status, us.avatar_path, us.star
                                        FROM comment as cm
                                        LEFT JOIN users as us
                                        ON cm.user_id = us.id WHERE cm.technician_id ='$id' ORDER BY date ASC ";
                                    $query2 = mysqli_query($connect, $sql2);
                                    $rowcount = mysqli_num_rows($query2);
                                    while ($row = mysqli_fetch_array($query2)) {
                                        if ($count == 0) {
                                            $count++;

                                            ?>
                                            <article class="row">
                                                <div class="col-md-10 col-sm-10">
                                                    <div class="panel panel-default arrow right">
                                                        <div class="panel-body">
                                                            <header class="text-right">
                                                                <div class="comment-user"><i
                                                                            class="fa fa-user"></i> <?php echo $row['status']; ?>
                                                                </div>
                                                                <time class="comment-date" datetime="16-12-2014 01:05">
                                                                    <i class="fa fa-clock-o"></i> <?php echo $row['date']; ?>
                                                                </time>
                                                            </header>
                                                            <div class="comment-post">
                                                                <p>
                                                                    <?php echo $row['text']; ?>
                                                                </p>
                                                            </div>
                                                            <!--                                                        <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 hidden-xs">
                                                    <figure class="thumbnail">
                                                        <img class="img-responsive"
                                                             src="<?php echo $row['avatar_path']; ?>"/>
                                                        <figcaption
                                                                class="text-center"><?php echo $row['firstname']; ?></figcaption>
                                                    </figure>
                                                </div>
                                            </article>
                                        <?php } else {
                                            $count--;
                                            ?>
                                            <article class="row">
                                                <div class="col-md-2 col-sm-2 hidden-xs">
                                                    <figure class="thumbnail">
                                                        <img class="img-responsive"
                                                             src="<?php echo $row['avatar_path']; ?>"/>
                                                        <figcaption
                                                                class="text-center"><?php echo $row['firstname']; ?></figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-md-10 col-sm-10 col-xs-12">
                                                    <div class="panel panel-default arrow left">
                                                        <div class="panel-body">
                                                            <header class="text-left">
                                                                <div class="comment-user"><i
                                                                            class="fa fa-user"></i> <?php echo $row['status']; ?>
                                                                </div>
                                                                <time class="comment-date" datetime="16-12-2014 01:05">
                                                                    <i class="fa fa-clock-o"></i> <?php echo $row['date']; ?>
                                                                </time>
                                                            </header>
                                                            <div class="comment-post">
                                                                <p>
                                                                    <?php echo $row['text']; ?>
                                                                </p>
                                                            </div>
                                                            <!--                                                        <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>

                                        <?php }
                                    } ?>


                                </ul>
                                <form class="form-inline" name="frm" role="form" method="post"
                                      action="comment.php?id=<?php echo $id ?>&user_id=<?php echo $_SESSION['id']; ?>&active=comment">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="text"
                                               placeholder="ข้อความของคุณ"/>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-default" name="bt" value="ส่งข้อมูล" id="GGG">ส่ง
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <script>

                                var objDiv = document.getElementById("commentList");
                                objDiv.scrollTop = objDiv.scrollHeight;

                            </script>
                        </div>
                    </div>

                    <!--                    -------------------------------------------------------------------------------------------สนทนาข้อความ------------------------------->

                    <div id="menu5" class="tab-pane fade <?php if ($active == "chat") {
                        echo "in active";
                    } ?>">
                        <div class="col-md-2">
                            <div class="detailBox">
                                <div class="titleBox">
                                    <label>แชท</label>
                                    <button type="button" class="close" aria-hidden="true">&times;</button>
                                </div>
                                <div class="actionBox">
                                    <?php if ($_SESSION['status']== 'technician' ) {?>

                                    <ul class="commentLis3" id="commentList3">
                                        <?php
                                             $count3 = 0;
                                             $session_id = $_SESSION['id'];
                                             $sql3 = "SELECT us.firstname, us.status, us.avatar_path, us.star, rm.id, rm.user_a, rm.user_b, rm.date
                                                      FROM users as us
                                                      LEFT JOIN room as rm
                                                      ON us.id = rm.user_a WHERE (rm.user_a = '$session_id') || (rm.user_b = '$session_id') ORDER BY date ASC ";
                                             $query3 = mysqli_query($connect, $sql3);
                                             $rowcount3 = mysqli_num_rows($query3);
                                             while ($row = mysqli_fetch_array($query3)) { ?>
                                                 <a href="profile-all.php?id=<?php echo $row['user_a'] ?>&active=chat" >
                                                     <img src="<?php echo $row['avatar_path']?>" alt="Lights" style="hight:50px; width: 50px; margin-top: 10px" class="img-circle" >
                                                     <div class="caption" style="margin-bottom: -10px">
                                                         <p href="profile-all.php?id=<?php echo $row['user_a'] ?>&active=chat"><?php echo $row['firstname'];?> </p>

                                                     </div>
                                                 </a>
                                             <?php }
                                        $count++;
                                        ?>
                                    </ul>
                                    <?php }else if ($_SESSION['status']== 'user' ) {?>
                                        <ul class="commentLis3" id="commentList3">
                                            <?php
                                            $count3 = 0;
                                            $session_id = $_SESSION['id'];
                                            $sql3 = "SELECT us.firstname, us.status, us.avatar_path, us.star, rm.id, rm.user_a, rm.user_b, rm.date
                                                      FROM users as us
                                                      LEFT JOIN room as rm
                                                      ON us.id = rm.user_b WHERE (rm.user_a = '$session_id') || (rm.user_b = '$session_id') ORDER BY date ASC ";
                                            $query3 = mysqli_query($connect, $sql3);
                                            $rowcount3 = mysqli_num_rows($query3);
                                            while ($row = mysqli_fetch_array($query3)) { ?>
                                                <a href="profile-all.php?id=<?php echo $row['user_b'] ?>&active=chat" >
                                                    <img src="<?php echo $row['avatar_path']?>" alt="Lights" style="hight:50px; width: 50px; margin-top: 10px" class="img-circle" >
                                                    <div class="caption" style="margin-bottom: -10px">
                                                        <p href="profile-all.php?id=<?php echo $row['user_b'] ?>&active=chat"><?php echo $row['firstname'];?> </p>

                                                    </div>
                                                </a>
                                            <?php }
                                            $count++;
                                            ?>
                                        </ul>

                                   <?php }else{
                                        echo "status ... : ". $_SESSION['status'];
                                    }?>
                                </div>
                                <script>

                                    var objDiv = document.getElementById("commentList2");
                                    objDiv.scrollTop = objDiv.scrollHeight;

                                </script>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="detailBox">
                                <div class="titleBox">
                                    <label>กำลังสนทนากับ <?php echo $firstname?></label>
                                    <button type="button" class="close" aria-hidden="true">&times;</button>
                                </div>
                                <div class="actionBox">
                                    <ul class="commentList" id="commentList2">
                                        <?php
                                        $count3 = 0;
                                        $room_id = "";
                                        $user_id = $_SESSION['id'];
                                        $id;
                                        $sql3 = "SELECT ch.id,ch.room_id, ch.me_id, ch.you_id, ch.message, ch.date, us.firstname, us.status, us.avatar_path, us.star
                                        FROM chat as ch
                                        LEFT JOIN users as us
                                        ON ch.me_id = us.id WHERE (ch.me_id ='$user_id' AND ch.you_id = '$id') OR (ch.me_id ='$id' AND ch.you_id = '$user_id') ORDER BY date ASC ";
                                        $query3 = mysqli_query($connect, $sql3);
                                        $rowcount3 = mysqli_num_rows($query3);

                                        while ($row = mysqli_fetch_array($query3)) {
                                            if ($_SESSION['id']==$row['me_id']) {
                                                $count++;
                                                ?>

                                                <article class="row" style="max-width: 90%">
                                                    <div class="col-md-10 col-sm-10">
                                                        <div class="panel panel-default arrow right">
                                                            <div class="panel-body">
                                                                <header class="text-right">
                                                                    <div class="comment-user"><i
                                                                                class="fa fa-user"></i> <?php echo $row['status']; ?>
                                                                    </div>
                                                                    <time class="comment-date" datetime="16-12-2014 01:05">
                                                                        <i class="fa fa-clock-o"></i> <?php echo $row['date']; ?>
                                                                    </time>
                                                                </header>
                                                                <div class="comment-post">
                                                                    <p>
                                                                        <?php echo $row['message']; ?>
                                                                    </p>
                                                                </div>
                                                                <!--                                                        <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 hidden-xs">
                                                        <figure class="thumbnail">
                                                            <img class="img-responsive"
                                                                 src="<?php echo $row['avatar_path']; ?>"/>
                                                            <figcaption
                                                                    class="text-center"><?php echo $row['firstname']; ?></figcaption>
                                                        </figure>
                                                    </div>

                                                </article>

                                            <?php } else {
                                                $count--;
                                                ?>
                                                <article class="row">
                                                    <div class="col-md-2 col-sm-2 hidden-xs">
                                                        <figure class="thumbnail">
                                                            <img class="img-responsive"
                                                                 src="<?php echo $row['avatar_path']; ?>"/>
                                                            <figcaption
                                                                    class="text-center"><?php echo $row['firstname']; ?></figcaption>
                                                        </figure>
                                                    </div>
                                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                                        <div class="panel panel-default arrow left">
                                                            <div class="panel-body">
                                                                <header class="text-left">
                                                                    <div class="comment-user"><i
                                                                                class="fa fa-user"></i> <?php echo $row['status']; ?>
                                                                    </div>
                                                                    <time class="comment-date" datetime="16-12-2014 01:05">
                                                                        <i class="fa fa-clock-o"></i> <?php echo $row['date']; ?>
                                                                    </time>
                                                                </header>
                                                                <div class="comment-post">
                                                                    <p>
                                                                        <?php echo $row['message']; ?>
                                                                    </p>
                                                                </div>
                                                                <!--                                                        <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>

                                            <?php }
                                           $room_id = $row['room_id'];
                                        } ?>


                                    </ul>
                                    <form class="form-inline" name="frm" role="form" method="post"
                                          action="comment.php?id=<?php echo $id ?>&user_id=<?php echo $_SESSION['id']; ?>&active=chat&room_id=<?php if($rowcount3==0) {echo "newroom";}else{ echo $room_id;}?>">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="text"
                                                   placeholder="ข้อความของคุณ"/>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-default" name="bt" value="ส่งข้อมูล" id="GGG">ส่ง
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <script>

                                    var objDiv = document.getElementById("commentList2");
                                    objDiv.scrollTop = objDiv.scrollHeight;

                                </script>
                            </div>
                        </div>


                    </div>

                </div>
            </div>


        </div>


    </div>
</div>
</body>
</html>


}