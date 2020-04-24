<pre>
<?php
print_r($_POST);
echo "<br>";
echo "<br>";
//print_r($_FILES);
$target_dir = "uploads/test/";
if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
        echo "Folder Created.";
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
            echo "Upload: " . $fileName . "<br>";
            copy($fileUpload, $target_dir . $fileName);


        }
    }
}
?>
</pre>


<?php
//$target_dir = "uploads/test/";
//
//if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
//        echo "Folder Created.";
//}
//// รับค่าไฟล์อัปโหลดที่ส่งมาจากฟอร์ม
//$fileupload = $_FILES['file_upload'];
//// วนลูปทีละรายการ
//foreach ($fileupload['tmp_name'] as $i => $tmp_name) {
//    // ตรวจสอบว่ามีไฟล์ส่งมาหรือไม่
//    if ($tmp_name != '') {
//        echo "---------------------- : 1 ";
//        // แสดงผลค่าที่ส่งมา
//        echo $fileupload['name'][$i] . '<br>';
//        echo $tmp_name . '<br>';
//        echo $fileupload['type'][$i] . '<br>';
//        if ($fileupload['type'][$i] != "image/jpg" && $fileupload['type'][$i] != "image/png" && $fileupload['type'][$i] != "image/jpeg"
//            && $fileupload['type'][$i] != "image/gif") {
//            echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//        }
//        echo "---------------------- : 2 ";
//
////        echo $fileupload['type'][$i].'<br>';
//        if ($fileupload['size'][$i] > 5000000) {
//            echo " ขนาดรูปใหญ่เกินไป";
//        }
////        echo $fileupload['size'][$i].'<br>';
//        echo '-----------<br>';
//        // สำเนาไฟล์ไปยังปลายทาง
//        echo "---------------------- : 3 ";
//
//        copy($tmp_name, $target_dir . $fileupload['name'][$i]);
//        $avatar_path = $target_dir . $fileupload['name'][$i];
//    }
//}
//?>