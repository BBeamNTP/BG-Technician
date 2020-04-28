<?php
require 'connection.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    echo '<script>alert("Both Fields are required")</script>';
} else {
    $email = mysqli_real_escape_string($connect, $email);
    $password = mysqli_real_escape_string($connect, $password);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($password, $row["password"])) {
                //return true;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $row['id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['sex'] = $row['sex'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['detail'] = $row['detail'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['avatar_path'] = $row['avatar_path'];
//                echo "เข้าสู่ระบบ เสร็จสิ้น ";
                if ($row['status'] =='admin'){
                    header("location:admin-index.php");

                }else if ($row['status'] =='technician'){
                    header("location:index.php");

                }else if($row['status'] =='wait'){
                    $status = $row['status'];
                    $id = $row['id'];
                    header("location:wait-status.php?id=$id&email=$email");

                }else if($row['status'] =='wait-fix'){
                    $status = $row['status'];
                    $id = $row['id'];
                    header("location:wait-status.php?id=$id&email=$email");
                }else{
                    header("location:index.php");
                }
            }
        }
    } else {
        //return false;
        echo '<script>
                        alert("Wrong User Details")
                        window.location.href = \'login.php\';
                      </script>';

    }
}

?>