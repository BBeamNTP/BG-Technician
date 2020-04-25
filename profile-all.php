<?php
require 'header.php';
require 'connection.php';
if ((!isset($_SESSION['email']) && ($_SESSION['status'] != "technician"))) {
    header('location: login.php');
}
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

//        $_SESSION['id'] = $row['id'];
        $email = $row['email'];
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


<div class="container">
    <div class="container" align="center" style="margin-top: 5px;">
        <h2>ข้อมูลส่วนตัวช่าง</h2>
        <div class="container">
            <form method="get" action="index.php" style="margin-left: 100%">
                <input type="submit" class="btn btn-primary" value="กลับสู่หน้าหลัก">
            </form>
        </div>
        <div class="container" style="margin-top: -3%;">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">ข้อมูลส่วนตัวช่าง</a></li>
                    <li><a data-toggle="tab" href="#menu1">ประเถทงานที่ทำ</a></li>
                    <li><a data-toggle="tab" href="#menu2">รูปประสบการณ์ทำงาน</a></li>
                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                </ul>

                <div class="tab-content" style="margin-top: 50px">
                    <div id="home" class="tab-pane fade in active">
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
                            </div>
                            <div class="col-md-5" style="margin-top: 40px">

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
                    <div id="menu1" class="tab-pane fade">
                        <div class="card" style="margin-top: 20px">
                            <!-- Default panel contents -->
                            <?php
                            $query = "SELECT * FROM work WHERE email = '$email'";
                            $result = mysqli_query($connect, $query);
                            $stack = array();
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    //        $_SESSION['id'] = $row['id'];
                                    $type = $row['work_name'];
                                    array_push($stack, $type);

                                }
                            }

                            ?>
                            <ul class="list-group list-group-flush"style="margin-left: 30%; margin-right: 30%;">
                                <li class="list-group-item" >
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
                    <div id="menu2" class="tab-pane fade">
                        <div class="container" align="center">
                            <!--                            <table width="1080" border="0" align="center" style="margin-top: 3%">-->
                            <!--                                <td align="center">-->
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
                            <!--                            </table>-->
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo.</p>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
</body>
</html>

