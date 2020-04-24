<?php
// รับค่าไฟล์อัปโหลดที่ส่งมาจากฟอร์ม
$fileupload = $_FILES['fileToUpload2'];
// วนลูปทีละรายการ
foreach ($fileupload['tmp_name'] as $i => $tmp_name) {
    // ตรวจสอบว่ามีไฟล์ส่งมาหรือไม่
    if ($tmp_name != '') {
        // แสดงผลค่าที่ส่งมา
        echo $fileupload['name'][$i].'<br>';
        echo $tmp_name.'<br>';
        echo $fileupload['type'][$i].'<br>' ;
        if ($fileupload['type'][$i] != "image/jpg" && $fileupload['type'][$i] != "image/png" && $fileupload['type'][$i] != "image/jpeg"
            && $fileupload['type'][$i] != "image/gif") {
            echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed." ;
        }
//        echo $fileupload['type'][$i].'<br>';
        if ($fileupload['size'][$i] > 5000000) {
            echo " ขนาดรูปใหญ่เกินไป";
        }
//        echo $fileupload['size'][$i].'<br>';
        echo '-----------<br>';
        // สำเนาไฟล์ไปยังปลายทาง

        $target_dir = "uploads/img/test/";
        if (!@mkdir($target_dir, 0, true)) { // เช็คว่ามีไฟล์หรือยัง
//        echo "Folder Created.";
        }
        copy($tmp_name, $target_dir.$fileupload['name'][$i]);
    }
}