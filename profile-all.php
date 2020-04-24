<?php
require 'header.php';
require 'connection.php';
//if ((!isset($_SESSION['email']) && ($_SESSION['status'] != "techinician"))) {
//    header('location: login.php');
//}

$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connect, $query);
//if (mysqli_num_rows($result) > 0) {
//    while ($row = mysqli_fetch_array($result)) {
//
//        $_SESSION['id'] = $row['id'];
//        $_SESSION['firstname'] = $row['firstname'];
//        $_SESSION['lastname'] = $row['lastname'];
//        $_SESSION['sex'] = $row['sex'];
//        $_SESSION['address'] = $row['address'];
//        $_SESSION['contact'] = $row['contact'];
//        $_SESSION['detail'] = $row['detail'];
//        $_SESSION['status'] = $row['status'];
//        $_SESSION['avatar_path'] = $row['avatar_path'];
//    }
//}
//?>
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
                    <img id="blah" src="<?php echo $_SESSION['avatar_path'] ?>" alt="your image" width="300px"
                         height="auto"/>
                </div>
                <div class="col-md-5" align="left" style="margin-top: 30px">

                    <div class="form-group">
                        <h5>อีเมล : <?php echo $_SESSION['email'] ?></h5>
                    </div>
                    <div class="form-group">
                        <h5>ชื่อ : <?php echo $_SESSION['firstname'] ?></h5>
                    </div>
                    <div class="form-group">
                        <h5>นามสกุล : <?php echo $_SESSION['lastname'] ?></h5>
                    </div>
                    <div class="form-group">
                        <h5>เพศ : <?php if ($_SESSION['sex'] == "male") {
                                echo "ชาย";
                            } elseif ($_SESSION['sex'] == "female") {
                                echo "หญิง";
                            } else {
                                echo "ไม่ระบุ";
                            } ?></h5>
                    </div>
                    <div class="form-group">
                        <h5>ที่อยู่ : <?php echo $_SESSION['address'] ?></h5>
                    </div>
                    <div class="form-group">
                        <h5>ติดต่อ : <?php echo $_SESSION['contact'] ?></h5>
                    </div>
                    <div class="form-group">
                        <h5>รายละเอียด : <?php echo $_SESSION['detail'] ?></h5>
                    </div>

                </div>

            </div>
            <hr class="style20">

            <label><h3>รูปประสบการณ์ทำงาน</h3></label>
            <div class="container" align="center">
                <table width="1080" border="0" align="center" style="margin-top: 3%">

                    <td align="center">
                        <div class="row">
                            <?php
                            $email = $_SESSION['email'];
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
                        <br>

            </div>
            </table>
        </div>


    </div>
    <div class="form-group">
        <form method="get" action="index.php">
            <input type="submit" class="btn btn-primary" value="กลับสู่หน้าหลัก">
        </form>
    </div>
    </form>


</div>
</body>
</html>

