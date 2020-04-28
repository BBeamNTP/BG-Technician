<?php
require "connection.php";

$id = $_GET['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$contact = $_POST['contact'];


echo $query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if ($email == $row['email']) {
            if ($id == 1) {
                echo '<script>
                        alert("อีเมล์นี้ถูกใช้งานแล้ว")
                        window.location.href = \'register-member.php\';
                      </script>';
            } else if ($id == 2){
                echo '<script>
                        alert("อีเมล์นี้ถูกใช้งานแล้ว")
                        window.location.href = \'register-technician.php\';
                      </script>';
            }else{
                echo "error";
            }
        }
    }
} else {
    if ($id == 1) {
        $status = "user ";

        $target_dir = "uploads/$id/$email/avatar/";
        echo $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo " File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo " File is not an image.";
                $uploadOk = 0;
            }
        }
        if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
//        echo "Folder Created.";
        }

// Check if file already exists
        if (file_exists($target_file)) {  //ถ้ามีไฟล์เดิมอยู่จะลบแล้วอัฟใหม่
//    echo "Sorry, file already exists.";
            @unlink("$target_file"); //คำสั่งลบ
//    $uploadOk = 0;
        }

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo " Sorry, your file is too large.";
            $uploadOk = 0;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $path = "img/1.png";
            echo " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            echo " The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                $path = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            } else {
                echo " Sorry, there was an error uploading your file.";
            }
        }

        if (empty($email) || empty($password)) {
            echo '<script>alert("Both Fields are required")</script>';
        } else {
            $email = mysqli_real_escape_string($connect, $email);
            $password = mysqli_real_escape_string($connect, $password);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users(email, password, firstname, lastname, sex, address, contact, avatar_path) 
VALUES('$email', '$password', '$firstname', '$lastname', '$sex', '$address', '$contact','$path')";
            if (mysqli_query($connect, $query)) {
                echo '<script>
                    alert("สมัครสมาชิกเสร็จสิ้น") 
                    window.location.href = \'login.php\';
                  </script>';
            } else {
                echo "error";
            }
        }


    } else if ($id == 2) {
        $detail = $_POST['detail'];

        echo " status : " . $status = "technician";
        $target_dir = "uploads/$id/$email/avatar/";
        $target_dir_exprience = "uploads/$id/$email/exprience/";
        $target_dir_certificate = "uploads/$id/$email/certificate/";

        if (empty($email) || empty($password)) {
            echo '<script>alert("Both Fields are required")</script>';
        } else {
            $email = mysqli_real_escape_string($connect, $email);
            $password = mysqli_real_escape_string($connect, $password);
            $password = password_hash($password, PASSWORD_DEFAULT);

            // รับค่าไฟล์อัปโหลดที่ส่งมาจากฟอร์ม
            $fileupload = $_FILES['fileToUpload'];
            // วนลูปทีละรายการ
            foreach ($fileupload['tmp_name'] as $i => $tmp_name) {
                // ตรวจสอบว่ามีไฟล์ส่งมาหรือไม่
                if ($tmp_name != '') {
                    // แสดงผลค่าที่ส่งมา
                    echo $fileupload['name'][$i] . '<br>';
                    echo $tmp_name . '<br>';
                    echo $fileupload['type'][$i] . '<br>';
                    if ($fileupload['type'][$i] != "image/jpg" && $fileupload['type'][$i] != "image/png" && $fileupload['type'][$i] != "image/jpeg"
                        && $fileupload['type'][$i] != "image/gif") {
                        echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                    //        echo $fileupload['type'][$i].'<br>';
                    if ($fileupload['size'][$i] > 5000000) {
                        echo " ขนาดรูปใหญ่เกินไป";
                    }
                    //        echo $fileupload['size'][$i].'<br>';

                    // สำเนาไฟล์ไปยังปลายทาง

                    if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
                        //        echo "Folder Created.";
                    }
                    copy($tmp_name, $target_dir . $fileupload['name'][$i]);
                    $avatar_path = $target_dir . $fileupload['name'][$i];
                }
            }

            //----- อัฟโหลด รูปประสบการณ์ ----- ได้หลายรูป
            if (!@mkdir($target_dir_exprience, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
//                echo "Folder Created.";
            }
            if (isset($_FILES['file_upload'])) {
                $arr_removeFiles = array();
                if (isset($_POST['remove_file'])) {
                    $arr_removeFiles = $_POST['remove_file'];
                }
                $totalFile = count($_FILES['file_upload']['name']); // จำนวนไฟล์ทั้งหมด
                for ($i = 0; $i < $totalFile; $i++) {// วนลูปอัพโหลดไฟล์
                    $fileName = $_FILES['file_upload']['name'][$i];
                    $fileUpload = $_FILES['file_upload']['tmp_name'][$i];
                    //        echo $tmp_name = $_FILES['tmp_name'][$i];
                    if (!in_array($fileName, $arr_removeFiles)) { // อัพโหลดเฉพาะไฟล์ ที่ไม่ได้ลบ
//                        echo "Upload: " . $fileName . "<br>";
                        copy($fileUpload, $target_dir_exprience . $fileName);
                        $path_exprience = $target_dir_exprience . $fileName;
                        $query_ex = "INSERT INTO exprience(email, path_exprience)
                                        VALUES('$email','$path_exprience')";
                        if (mysqli_query($connect, $query_ex)) {
//                            echo "pass : " . $fileName . "<br>";
                        } else {
                            echo "error";
                        }
                    }
                }
            }

            //----- อัฟโหลด รูปใบรับรอง----- ได้หลายรูป

            if (!@mkdir($target_dir_certificate, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
                echo "Folder Created.";
            }
            if (isset($_FILES['file_upload2'])) {
                $arr_removeFiles2 = array();
                if (isset($_POST['remove_file2'])) {
                    $arr_removeFiles2 = $_POST['remove_file2'];
                }
                $totalFile2 = count($_FILES['file_upload2']['name']); // จำนวนไฟล์ทั้งหมด
                for ($i = 0; $i < $totalFile2; $i++) {// วนลูปอัพโหลดไฟล์
                    $fileName2 = $_FILES['file_upload2']['name'][$i];
                    $fileUpload2 = $_FILES['file_upload2']['tmp_name'][$i];
                    //        echo $tmp_name = $_FILES['tmp_name'][$i];
                    if (!in_array($fileName, $arr_removeFiles)) { // อัพโหลดเฉพาะไฟล์ ที่ไม่ได้ลบ
                        echo "Upload: " . $fileName . "<br>";
                        copy($fileUpload2, $target_dir_certificate . $fileName2);
                        $path_certificate= $target_dir_certificate . $fileName2;
                        $query_cer = "INSERT INTO certificate(email, path_certificate)
                                        VALUES('$email','$path_certificate')";
                        if (mysqli_query($connect, $query_cer)) {
//                            echo "pass : " . $fileName . "<br>";
                        } else {
                            echo "error";
                        }
                    }
                    }
                }



            // ปรพเภทงาน รับแบบ Array
            foreach ($_POST['type1'] AS $i => $text) {
//            echo "value of text[$i]='$text'<br />";
                $query = "INSERT INTO career(email, career_name)
                            VALUES('$email','$text')";
                if (mysqli_query($connect, $query)) {
                } else {
                    echo "error";
                }
            }

            $query = "INSERT INTO users(email, password, firstname, lastname, sex, address, contact, detail, status, avatar_path)
                            VALUES('$email', '$password', '$firstname', '$lastname', '$sex', '$address', '$contact','$detail','wait', '$avatar_path')";
            if (mysqli_query($connect, $query)) {
                echo '<script>
                    alert("สมัครสมาชิกเสร็จสิ้น")
                    window.location.href = \'login.php\';
                  </script>';
            } else {
                echo "error";
            }

        }
    } else {
        echo "error ";
    }


}


?>