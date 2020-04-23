<pre>
<?php
print_r($_POST);
echo "<br>";
echo "<br>";
//print_r($_FILES);
if(isset($_FILES['file_upload'])){
    $arr_removeFiles = array();
    if(isset($_POST['remove_file'])){
        $arr_removeFiles = $_POST['remove_file'];
    }
    $totalFile = count($_FILES['file_upload']['name']); // จำนวนไฟล์ทั้งหมด
    for($i = 0; $i < $totalFile; $i++){// วนลูปอัพโหลดไฟล์
        $fileName = $_FILES['file_upload']['name'][$i];
        $fileUpload = $_FILES['file_upload']['tmp_name'][$i];
        if(!in_array($fileName, $arr_removeFiles)){ // อัพโหลดเฉพาะไฟล์ ที่ไม่ได้ลบ
            echo "Upload: ".$fileName."<br>";
        }
    }
}
?>
</pre>