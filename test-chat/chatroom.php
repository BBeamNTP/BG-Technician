<?php
@$mes = $_POST['mes'];

if ($mes <> ""){
    $connect = mysqli_connect("localhost", "root", "", "datatest") or die(mysqli_error($connect));

//    $db=mysqli_select_db($dbname)or die("cannot connect database!");
    $sql="INSERT INTO chatroom ( mes)VALUES ('$mes');";
    $dbquery = mysqli_query($connect, $sql);

}
?>
<html >
<head>
    <META HTTP-EQUIV="REFRESH" CONTENT="5">
    <?php //<META HTTP-EQUIV="REFRESH" CONTENT="5">REFRESH ทุก 5 วินาที ?>
    <title>Untitled Document</title>
</head>

<body>
<table width="70%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th bgcolor="f2f2f2" scope="row"><form name="form2" method="post" action="<?=$_SERVER["PHP_SELF"] ;?>">
                <label>
                    <div align="left">
                        <?php
                        $hostname="localhost";
                        $user="";
                        $password="";
                        $dbname="datatest";//ชื่อฐานข้อมูล
                        $connect = mysqli_connect("localhost", "root", "", "datatest") or die(mysqli_error($connect));
                        $sql="select * from chatroom order by id DESC limit 0,10";//เรียกข้อมูล
                        $dbquery = mysqli_query($connect, $sql);

                        $row= mysqli_num_rows($dbquery);
                        while($result=mysqli_fetch_array($dbquery)) {
                            @$a[] = $result[mes]; //เก็บช้อความ 10 อันดับล่าสุดลงตัวแปร
                        }

                        for($i=count($a)-1;$i>=0;$i--) {
                            echo $a[$i]."<br>";
                        }
                        ?>
                    </div>
                </label>
            </form> </th>
    </tr>
    <tr>
        <th scope="row"><form name="form1" method="post" action="">
                <table width="88%" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <th scope="row"><font size="2">พิมพ์ข้อความที่นี่</font></th>
                        <td><label>
                                <div align="center">
                                    <input name="mes" type="text" id="mes" size="60">
                                </div>
                            </label></td>
                        <td><label>
                                <input name="Submit" type="submit" id="Submit" value="Send">
                            </label></td>
                    </tr>
                </table>
            </form> </th>
    </tr>
</table>
</body>
</html>