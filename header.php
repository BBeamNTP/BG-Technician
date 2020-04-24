<?php

?>
<head>
    <link rel="shortcut icon" href="img/logo.png"/>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<nav class="navbar navbar-inverse navabar-fixed-top" id="navcolor" >
    <div style="padding-left: 5%; padding-right: 5% " >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img src="img/logo.png" align="left" width="50px" height="auto" border="0"
                                     style="margin-right:20px"/></a>
            <a href="index.php" class="navbar-brand" style="color: #FFFFFF">BG-Techinician</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();
                if (isset($_SESSION['email']) && ($_SESSION['status']=="user")) {
                    ?>
                    <li><a href="profile-member.php"><span class="glyphicon glyphicon-user"></span> โปรไฟล์ </a></li>
<!--                    <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> ตั่งค่า </a></li>-->
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                } elseif(isset($_SESSION['email']) && ($_SESSION['status']=="techinician")){
                    ?>
                    <li><a href="profile-techinician.php"><span class="glyphicon glyphicon-user"></span> โปรไฟล์ </a></li>
<!--                    <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> ตั่งค่า </a></li>-->
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                }elseif(isset($_SESSION['email']) && ($_SESSION['status']=="admin")){
                    ?>
<!--                    <li><a href="profile-member.php"><span class="glyphicon glyphicon-user"></span> โปรไฟล์ </a></li>-->
<!--                    <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> ตั่งค่า </a></li>-->
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                }else{
                    ?>
                    <li class="dropdown" ><a class="glyphicon glyphicon-user" data-toggle="dropdown" href="#"> สมัครสมาชิก <span class="caret"></span></a>
                        <ul class="dropdown-menu" >
                            <li><a href="register-member.php">สมัครสมาชิกทั่วไป</a></li>
                            <li><a href="register-techinician.php">สมัครสมาชิกช่าง</a></li>
                        </ul>
                    </li>
<!--                    <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก </a></li>-->
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in" "></span> เข้าสู่ระบบ </a></li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>