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

                echo "data : " . $_SESSION['id'] = $row['id'];
                echo "data : " . $_SESSION['firstname'] = $row['firstname'];
                echo "data : " . $_SESSION['lastname'] = $row['lastname'];
                echo "data : " . $_SESSION['sex'] = $row['sex'];
                echo "data : " . $_SESSION['address'] = $row['address'];
                echo "data : " . $_SESSION['contact'] = $row['contact'];
                echo "data : " . $_SESSION['detail'] = $row['detail'];
                echo "data : " . $_SESSION['status'] = $row['status'];
                echo "data : " . $_SESSION['avatar_id'] = $row['avatar_id'];
                echo "data : " . $_SESSION['certificate_id'] = $row['certificate_id'];


                echo "เข้าสู่ระบบ เสร็จสิ้น ";
                header("location:index.php");
            } else {
                //return false;
                echo '<script>
                        alert("Wrong User Details")
                        window.location.href = \'login.php\';
                      </script>';

            }
        }
    } else {
        echo '<script>alert("Wrong User Details")</script>';
    }
}

?>