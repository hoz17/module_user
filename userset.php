<?php
require "connect.php";
session_start();
?>
<!DOCTYPE>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt người dùng</title>
</head>

<body align="center">

</body>
<a href="update.php?ID=<?php echo  $_SESSION["online"]; ?>">Sửa</a>
<p></p>
<a href="logout.php?ID=<?php echo  $_SESSION["online"]; ?>" onclick="return confirm('Are you sure you want to logout?')">Đăng Xuất</a>
<a href="delete.php?ID=<?php echo  $_SESSION["online"]; ?>" onclick="return confirm('Are you sure you want to delete?')">Xóa</a>

</html>