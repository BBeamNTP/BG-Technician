<?php
require "connection.php";
require "func_upload_img.php";
session_start();
$id = $_GET['id'];
$email = $_SESSION['email'];
//$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$contact = $_POST['contact'];

if ($id == 1) {
    $status = "user ";

    $target_dir = "uploads/img/Avatar/$id/$email/";
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
        echo " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            echo " The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo " Sorry, there was an error uploading your file.";
        }
    }
    $path = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//    if (empty($email) || empty($password)) {
//        echo '<script>alert("Both Fields are required")</script>';
//    } else {
//        $email = mysqli_real_escape_string($connect, $email);
//        $password = mysqli_real_escape_string($connect, $password);
//        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "update users set firstname='$firstname', lastname='$lastname', sex='$sex', address='$address', contact='$contact', avatar_id='$path' where email='$email'";
        if (mysqli_query($connect, $query)) {
            echo "data : " . $_SESSION['firstname'] = $firstname;
            echo "data : " . $_SESSION['lastname'] = $lastname;
            echo "data : " . $_SESSION['sex'] = $sex;
            echo "data : " . $_SESSION['address'] = $address;
            echo "data : " . $_SESSION['contact'] = $contact;
            echo "data : " . $_SESSION['avatar_id'] = $path;

            echo '<script>
                        alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
                        window.location.href = \'profile.php\';
                  </script>';
        } else {
            echo "error";
        }
//    }


} else if ($id == 2) {
    $detail = $_POST['detail'];
    $certificate = $_POST['certificate'];

    echo " status : " . $status = "techinician ";

    $target_dir = "uploads/img/Avatar/$id/$email/";
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
        echo " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            echo " The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo " Sorry, there was an error uploading your file.";
        }
    }
    $path_avatar = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    ///------------------------------------------------------------------------------------------------------------
    $target_dir = "uploads/img/Certificate/$id/$email/$certificate/";
    echo $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
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
    if ($_FILES["fileToUpload2"]["size"] > 50000000) {
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
        echo " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
//            echo " The file " . basename($_FILES["fileToUpload2"]["name"]) . " has been uploaded.";
        } else {
            echo " Sorry, there was an error uploading your file.";
        }
    }
    $path_Certificate = $target_dir . basename($_FILES["fileToUpload2"]["name"]);

    if (empty($email) || empty($password)) {
        echo '<script>alert("Both Fields are required")</script>';
    } else {
        $email = mysqli_real_escape_string($connect, $email);
        $password = mysqli_real_escape_string($connect, $password);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query_cer = "INSERT INTO certificate(cer_id, path_certificate) VALUES('$certificate','$path_Certificate')";
        if (mysqli_query($connect, $query_cer)) {
            echo " finish ";
        } else {
            echo " error ";
        }
        $query = "INSERT INTO users(email, password, firstname, lastname, sex, address, contact, detail, avatar_id, certificate_id) 
                            VALUES('$email', '$password', '$firstname', '$lastname', '$sex', '$address', '$contact','$detail','$path_avatar','$certificate')";
        if (mysqli_query($connect, $query)) {
            echo '<script>
                    alert("สมัครสมาชิกเสร็จสิ้น") 
                    window.location.href = \'index.php\';
                  </script>';
        } else {
            echo "error";
        }
    }


} else {
    echo " Error status ";
}

?>

