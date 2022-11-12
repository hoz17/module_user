<?php
require "connect.php";
session_start();
$sql = "SELECT Status FROM user WHERE ID=" . $_SESSION["online"];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if ($row['Status'] == 3)
    header("location:adminset.php");
?>
<!DOCTYPE>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt người dùng</title>
    <link rel="stylesheet" href="./CSS/userset.css">
</head>

<body>

</body>
<div class="page">
    <div class="container">
        <div class="left">
            <div class="Welcome">
                Welcome,
                <?php
                $sql = "SELECT Username FROM user WHERE ID=" . $_SESSION['online'];
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo $row['Username'];
                ?>
            </div>
            <div class="eula">User Function Here !!!</div>
        </div>
        <div class="right">
            <input type="button" onclick="location.href='update.php'" class="user-btn" value="Cập Nhật Thông Tin">
            <input type="button" onclick="location.href='changePassword.php'" class="user-btn" value="Thay Đổi Mật Khẩu">
            <input type="button" onclick="location.href='block.php'" class="user-btn" value="Khóa Tài Khoản">
            <input type="button" onclick="location.href='confirmDelete.php'" class="user-btn" value="Xóa Tài Khoản">
            <input type="button" onclick="location.href='logout.php'" class="user-btn" value="Đăng Xuất">
        </div>
    </div>
</div>

</html>