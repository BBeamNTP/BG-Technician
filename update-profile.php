<?php
require "connection.php";
session_start();
$user_type = $_GET['user_type'];
$id = $_GET['id'];
$status = $_GET['status'];
$email = $_SESSION['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$contact = $_POST['contact'];

if ($user_type == 1) { // user
    $target_dir = "uploads/$user_type/$email/avatar/";
    //----- อัฟโหลด รูปโปรไฟล์----- ได้หลายรูป
    if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
        echo "Folder Created.";
    }
    if (($_FILES['fileToUpload']['name'][0] == "")) {
        echo "NO FILE SELECT NEW !!!!!!";
        $path_avatar = $_SESSION['avatar_path'];

    } else if (isset($_FILES['fileToUpload'])) {
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
                $path_avatar = $target_dir . $fileName;
            }
        }
    } else {
        echo "no file ";
    }

    $query = "update users set firstname='$firstname', lastname='$lastname', sex='$sex', address='$address', contact='$contact', avatar_path='$path_avatar' where email='$email'";
    if (mysqli_query($connect, $query)) { ?>
            <script >
                        alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
                        window.location.href = 'profile-member.php';
            </script>
    <?php } else {
        echo "error";
    }


}
else if ($user_type == 2) { // ช่าง

    $detail = $_POST['detail'];

    echo " status : " . $status = "technician";
    $target_dir = "uploads/$id/$email/avatar/";
    $target_dir_exprience = "uploads/$id/$email/exprience/";
    $target_dir_certificate = "uploads/$id/$email/certificate/";

    //----- อัฟโหลด รูปโปรไฟล์----- ได้หลายรูป
    if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
        echo "Folder Created.";
    }



    if ((@$_FILES['fileToUpload']['name'][0] == "")) {
        echo "NO FILE SELECT NEW AVATAR !!!!!!";
        $path_avatar = $_SESSION['avatar_path'];

    } else if (isset($_FILES['fileToUpload'])) {
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
                $path_avatar = $target_dir . $fileName;

            }
        }
    } else {
        echo "no file ";
    }

    //----- อัฟโหลด รูปประสบการณ์ ----- ได้หลายรูป
    if (!@mkdir($target_dir_exprience, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
        echo "Folder Created.";
    }
    if ((@$_FILES['file_upload']['name'][0] == "")) {
        echo "NO FILE SELECT NEW EXPREIENCE!!!!!!";

    } else if (isset($_FILES['file_upload'])) {

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
                $path_exprience = $target_dir_exprience . $fileName;
                $query_ex = "INSERT INTO exprience(email, path_exprience)
                                        VALUES('$email','$path_exprience')";
                if (mysqli_query($connect, $query_ex)) {
                    echo "pass : " . $fileName . "<br>";
                } else {
                    echo "error";
                }
            }
        }
    } else {
        echo "no file ";
    }

    $query_del_ex = "DELETE FROM work WHERE email='$email'";
    if (mysqli_query($connect, $query_del_ex)) {
        echo "Del Finish ";
    } else {
        echo "Del error";
    }

    //----- อัฟโหลด รูปประสบการณ์ ----- ได้หลายรูป

    if (!@mkdir($target_dir_certificate, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
        echo "Folder Created.";
    }
    if ((@$_FILES['file_upload2']['name'][0] == "")) {
        echo "NO FILE SELECT NEW EXPREIENCE!!!!!!";

    } else if (isset($_FILES['file_upload2'])) {

        $query_del_cer = "DELETE FROM certificate WHERE email='$email'";
        if (mysqli_query($connect, $query_del_cer)) {
            echo "Del Finish ";
        } else {
            echo "Del error";
        }
        $arr_removeFiles = array();
        if (isset($_POST['remove_file2'])) {
            $arr_removeFiles = $_POST['remove_file2'];
        }
        $totalFile = count($_FILES['file_upload2']['name']); // จำนวนไฟล์ทั้งหมด
        for ($i = 0; $i < $totalFile; $i++) {// วนลูปอัพโหลดไฟล์
            $fileName2 = $_FILES['file_upload2']['name'][$i];
            $fileUpload2 = $_FILES['file_upload2']['tmp_name'][$i];
            //        echo $tmp_name = $_FILES['tmp_name'][$i];
            if (!in_array($fileName, $arr_removeFiles)) { // อัพโหลดเฉพาะไฟล์ ที่ไม่ได้ลบ
                echo "Upload: " . $fileName . "<br>";
                copy($fileUpload2, $target_dir_certificate . $fileName2);
                $path_certificate = $target_dir_certificate . $fileName2;
                $query_cer = "INSERT INTO certificate(email, path_certificate)
                                        VALUES('$email','$path_certificate')";
                if (mysqli_query($connect, $query_cer)) {
                    echo "pass : " . $fileName . "<br>";
                } else {
                    echo "error";
                }
            }
        }
    } else {
        echo "no file ";
    }

    foreach ($_POST['type1'] AS $i => $text) {
        echo "value of text[$i]='$text'<br />";
        $query = "INSERT INTO work(email, work_name)
                            VALUES('$email','$text')";
        if (mysqli_query($connect, $query)) {
        } else {
            echo "error";
        }
    }

    if(isset($status)&&$status=="wait-fix"){
        $query = "update users set firstname='$firstname', lastname='$lastname', sex='$sex', address='$address', contact='$contact',status='fixed', avatar_path='$path_avatar', detail='$detail' where email='$email'";
        $query_del_messgae = "DELETE FROM message WHERE email='$email'";
        if (mysqli_query($connect, $query_del_messgae)) {
            echo "Del Finish ";
        } else {
            echo "Del error";
        }

    }else if(isset($status)&&$status=="technician") {
        $query = "update users set firstname='$firstname', lastname='$lastname', sex='$sex', address='$address', contact='$contact', avatar_path='$path_avatar', detail='$detail' where email='$email'";
        $query_del_messgae = "DELETE FROM message WHERE email='$email'";
        if (mysqli_query($connect, $query_del_messgae)) {
            echo "Del Finish ";
        } else {
            echo "Del error";
        }
    }

    if (mysqli_query($connect, $query)) {
        if(isset($status)&&$status=="wait-fix"){ ?>
            <script type="text/javascript">
                alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
                window.location.href = 'wait-status.php?id=<?php echo $id ?>&email=<?php echo $email ?>&status=<?php echo 'fixed' ?>';
            </script>
        <?php } else if(isset($status)&&$status=="technician"){ ?>
            <script type="text/javascript">
                alert("เปลี่ยนแปลงข้อมูลเรียบร้อย")
                window.location.href = 'profile-technician.php';
            </script>
        <?php } else{
            echo "error : update-profile 186"
            ?>

        <?php }

    }

}else{
    echo "error :";
}
?>

