<?php
session_start();
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
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style-admin.css" type="text/css">
</head>
<nav class="navbar navbar-inverse" >
    <div style="padding-left: 5%; padding-right: 5% " >
        <?php

        if(isset($_SESSION['email']) && (($_SESSION['status']=="wait") || ($_SESSION['status']=="wait-fix" || ($_SESSION['status']=="fixed") ))) {
            ?>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>
                <a href="wait-status.php?email=<?php echo $_SESSION['email'];?>&id=<?php echo $_SESSION['id'];?>"><img src="img/logo.png" align="left" width="50px" height="auto" border="0"                                               style="margin-right:20px"/></a>
                <a href="wait-status.php?email=<?php echo $_SESSION['email'];?>&id=<?php echo $_SESSION['id'];?>" class="navbar-brand" style="color: #ff8000">BG-Technician</a>
            </div>
            <?php
        }elseif(isset($_SESSION['email']) && ($_SESSION['status']=="admin")){?>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>
                <a href="admin-index.php"><img src="img/logo.png" align="left" width="50px" height="auto" border="0" style="margin-right:20px"/></a>
                <a href="admin-index.php" class="navbar-brand" style="color: #ff8000">BG-Technician</a>
            </div>
        <?php }else{?>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>
                <a href="index.php"><img src="img/logo.png" align="left" width="50px" height="auto" border="0" style="margin-right:20px"/></a>
                <a href="index.php" class="navbar-brand" style="color: #ff8000">BG-Technician</a>
            </div>
        <?php }
        ?>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['email']) && ($_SESSION['status']=="user")) {
                    ?>
                    <li><a href="profile-all.php?id=<?php echo $_SESSION['id']; ?>&active=chat" style="color: #ff8000"><span class="glyphicon glyphicon-comment"></span> Messenger </a></li>
                    <li><a href="profile-member.php" style="color: #ff8000"><span class="glyphicon glyphicon-user" ></span> <?php echo $_SESSION['firstname'];?> </a></li>
                    <li><a href="logout.php" style="color: #ff8000"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                } elseif(isset($_SESSION['email']) && ($_SESSION['status']=="technician")){
                    ?>
                    <li><a href="profile-all.php?id=<?php echo $_SESSION['id']; ?>&active=chat" style="color: #ff8000"><span class="glyphicon glyphicon-comment"></span> Messenger </a></li>
                    <li><a href="profile-technician.php" style="color: #ff8000"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname'];?> </a></li>
                    <li><a href="logout.php" style="color: #ff8000"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                }elseif(isset($_SESSION['email']) && ($_SESSION['status']=="admin")){
                    ?>
                    <li><a href="" style="color: #ff8000"><span class="glyphicon glyphicon-king"></span> <?php echo $_SESSION['status'];?> </a></li>
                    <li><a href="" style="color: #ff8000"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname'];?> </a></li>
                    <li><a href="logout.php" style="color: #ff8000"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                }elseif(isset($_SESSION['email']) && (($_SESSION['status']=="wait") || ($_SESSION['status']=="wait-fix") ||($_SESSION['status']=="fixed") )){
                    ?>
                    <li><a href="" style="color: #ff8000"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname'];?> </a></li>
                    <li><a href="logout.php" style="color: #ff8000"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    <?php
                }else{
                    ?>
                    <li class="dropdown" style="color: #ff8000"><a class="glyphicon glyphicon-user" data-toggle="dropdown" href="#" style="color: #ff8000"> สมัครสมาชิก <span class="caret"></span></a>
                        <ul class="dropdown-menu" >
                            <li><a href="register-member.php" style="color: #ff8000">สมัครสมาชิกทั่วไป</a></li>
                            <li><a href="register-technician.php" style="color: #ff8000">สมัครสมาชิกช่าง</a></li>
                        </ul>
                    </li>
                    <li><a href="login.php" style="color: #ff8000"><span class="glyphicon glyphicon-log-in" style="t"></span> เข้าสู่ระบบ </a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>