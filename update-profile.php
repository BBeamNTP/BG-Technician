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
echo $detail = $_POST['detail'];


if ($id == 1) {
    $status = "user ";

    $target_dir = "uploads/$id/$email/avatar/";

    //----- อัฟโหลด รูปโปรไฟล์----- ได้หลายรูป
    if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
        echo "Folder Created.";
    }
    if (($_FILES['fileToUpload']['name'][0]=="")){
        echo "NO FILE SELECT NEW !!!!!!";
        $path_avatar = $_SESSION['avatar_path'];

    }else if (isset($_FILES['fileToUpload'])) {
        $arr_removeFiles = array();
        if (isset($_POST['remove_file'])) {
            $arr_removeFiles = $_POST['remove_file'];
        }
        $totalFile = count($_FILES['fileToUpload']['name']); // จำนวนไฟล์ทั้งหมด
        for ($i = 0; $i < $totalFile; $i++) {// วนลูปอัพโหลดไฟล์
            $fileName = $_FILES['fileToUpload']['name'][$i];
            $fileUpload = $_FILES['fileToUpload']['tmp_name'][$i];
            //        echo $tmp_name = $_FILES['tmp_name'][$i];

            if (!in_array($fileName, $arr_removeFiles)) { // อัพโหลดเฉพาะไฟล์ ที่ไม่ได้ลบ
                echo "Upload: " . $fileName . "<br>";
                copy($fileUpload, $target_dir . $fileName);
                $path_avatar = $target_dir.$fileName;

            }
        }
    }else{
        echo "no file ";
    }

        $query = "update users set firstname='$firstname', lastname='$lastname', sex='$sex', address='$address', contact='$contact', avatar_path='$path_avatar' where email='$email'";
        if (mysqli_query($connect, $query)) {

            echo '<script>
                        alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
                        window.location.href = \'profile-member.php\';
                  </script>';
        } else {
            echo "error";
        }
//    }

} else if ($id == 2) {
//    $certificate1 = $_POST['certificate1'];
//    $certificate2 = $_POST['certificate2'];
//    $certificate3 = $_POST['certificate3'];
    echo " status : " . $status = "techinician";
    $target_dir = "uploads/$id/$email/avatar/";
    $target_dir_exprience = "uploads/$id/$email/exprience/";

        //----- อัฟโหลด รูปโปรไฟล์----- ได้หลายรูป
        if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
            echo "Folder Created.";
        }

        if (($_FILES['fileToUpload']['name'][0]=="")){
            echo "NO FILE SELECT NEW AVATAR !!!!!!";
            $path_avatar = $_SESSION['avatar_path'];

        }else if (isset($_FILES['fileToUpload'])) {
            $arr_removeFiles = array();
            if (isset($_POST['remove_file'])) {
                $arr_removeFiles = $_POST['remove_file'];
            }
            $totalFile = count($_FILES['fileToUpload']['name']); // จำนวนไฟล์ทั้งหมด
            for ($i = 0; $i < $totalFile; $i++) {// วนลูปอัพโหลดไฟล์
                $fileName = $_FILES['fileToUpload']['name'][$i];
                $fileUpload = $_FILES['fileToUpload']['tmp_name'][$i];
                //        echo $tmp_name = $_FILES['tmp_name'][$i];

                if (!in_array($fileName, $arr_removeFiles)) { // อัพโหลดเฉพาะไฟล์ ที่ไม่ได้ลบ
                    echo "Upload: " . $fileName . "<br>";
                    copy($fileUpload, $target_dir . $fileName);
                    $path_avatar = $target_dir.$fileName;

                }
            }
        }else{
            echo "no file ";
        }

        //----- อัฟโหลด รูปประสบการณ์ ----- ได้หลายรูป
        if (!@mkdir($target_dir_exprience, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
            echo "Folder Created.";
        }
        if (($_FILES['file_upload']['name'][0]=="")){
            echo "NO FILE SELECT NEW EXPREIENCE!!!!!!";
            $path_avatar = $_SESSION['avatar_path'];

        }else if (isset($_FILES['file_upload'])) {

            $query_del_ex = "DELETE FROM exprience WHERE email='$email'";
            if (mysqli_query($connect, $query_del_ex)) {
                echo "Del Finish ";
            } else {
                echo "Del error";
            }
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
                    echo "Upload: " . $fileName . "<br>";
                    copy($fileUpload, $target_dir_exprience . $fileName);
                    $path_exprience = $target_dir_exprience.$fileName;

                    $query_ex = "INSERT INTO exprience(email, path_exprience)
                                        VALUES('$email','$path_exprience')";
                    if (mysqli_query($connect, $query_ex)) {
                        echo "pass : ". $fileName."<br>";
                    } else {
                        echo "error";
                    }
                }
            }
        }
        else{
            echo "no file ";
        }

//        $query_cer = "INSERT INTO certificate(cer_id, path_certificate) VALUES('$certificate','$path_Certificate')";
//        if (mysqli_query($connect, $query_cer)) {
//            echo " finish ";
//        } else {
//            echo " error ";
//        }
        $query = "update users set firstname='$firstname', lastname='$lastname', sex='$sex', address='$address', contact='$contact', avatar_path='$path_avatar', detail='$detail' where email='$email'";
        if (mysqli_query($connect, $query)) {

            echo '<script>
                        alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
                        window.location.href = \'profile-techinician.php\';
                  </script>';
        } else {
            echo "error";
        }
        ///------------------------------------------------------------------------------------------------------------
//        $target_dir = "uploads/img/$id/$email/Certificate/";
//
//        // รับค่าไฟล์อัปโหลดที่ส่งมาจากฟอร์ม
//        $fileupload1 = $_FILES['fileToUpload1'];
//// วนลูปทีละรายการ
//        foreach ($fileupload1['tmp_name'] as $i => $tmp_name) {
//            // ตรวจสอบว่ามีไฟล์ส่งมาหรือไม่
//            if ($tmp_name != '') {
//                // แสดงผลค่าที่ส่งมา
//                echo $certificate1;
//                echo $fileupload1['name'][$i] . '<br>';
//                echo $tmp_name . '<br>';
//                echo $fileupload1['type'][$i] . '<br>';
//                if ($fileupload1['type'][$i] != "image/jpg" && $fileupload1['type'][$i] != "image/png" && $fileupload1['type'][$i] != "image/jpeg"
//                    && $fileupload1['type'][$i] != "image/gif") {
//                    echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                }
////        echo $fileupload1['type'][$i].'<br>';
//                if ($fileupload1['size'][$i] > 5000000) {
//                    echo " ขนาดรูปใหญ่เกินไป";
//                }
////        echo $fileupload1['size'][$i].'<br>';
//                echo '-----------<br>';
//                // สำเนาไฟล์ไปยังปลายทาง
//
//                if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
////        echo "Folder Created.";
//                }
//                copy($tmp_name, $target_dir .$certificate1.".jpg");
//            }
//        }
//
//        $fileupload2 = $_FILES['fileToUpload2'];
//// วนลูปทีละรายการ
//        foreach ($fileupload2['tmp_name'] as $i => $tmp_name) {
//            // ตรวจสอบว่ามีไฟล์ส่งมาหรือไม่
//            if ($tmp_name != '') {
//                // แสดงผลค่าที่ส่งมา
//                echo $certificate2;
//                echo $fileupload2['name'][$i] . '<br>';
//                echo $tmp_name . '<br>';
//                echo $fileupload2['type'][$i] . '<br>';
//                if ($fileupload2['type'][$i] != "image/jpg" && $fileupload2['type'][$i] != "image/png" && $fileupload2['type'][$i] != "image/jpeg"
//                    && $fileupload2['type'][$i] != "image/gif") {
//                    echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                }
////        echo $fileupload2['type'][$i].'<br>';
//                if ($fileupload2['size'][$i] > 5000000) {
//                    echo " ขนาดรูปใหญ่เกินไป";
//                }
////        echo $fileupload2['size'][$i].'<br>';
//                echo '-----------<br>';
//                // สำเนาไฟล์ไปยังปลายทาง
//
//                if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
////        echo "Folder Created.";
//                }
//                copy($tmp_name, $target_dir .$certificate2.".jpg");
//            }
//        }
//
//        $fileupload3 = $_FILES['fileToUpload3'];
//// วนลูปทีละรายการ
//        foreach ($fileupload3['tmp_name'] as $i => $tmp_name) {
//            // ตรวจสอบว่ามีไฟล์ส่งมาหรือไม่
//            if ($tmp_name != '') {
//                // แสดงผลค่าที่ส่งมา
//                echo $certificate3;
//                echo $fileupload3['name'][$i] . '<br>';
//                echo $tmp_name . '<br>';
//                echo $fileupload3['type'][$i] . '<br>';
//                if ($fileupload3['type'][$i] != "image/jpg" && $fileupload3['type'][$i] != "image/png" && $fileupload3['type'][$i] != "image/jpeg"
//                    && $fileupload3['type'][$i] != "image/gif") {
//                    echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                }
////        echo $fileupload3['type'][$i].'<br>';
//                if ($fileupload3['size'][$i] > 5000000) {
//                    echo " ขนาดรูปใหญ่เกินไป";
//                }
////        echo $fileupload3['size'][$i].'<br>';
//                echo '-----------<br>';
//                // สำเนาไฟล์ไปยังปลายทาง
//
//                if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
////        echo "Folder Created.";
//                }
//                copy($tmp_name, $target_dir .$certificate3.".jpg");
//            }
//        }

}else{
    echo "error ";
}
?>
