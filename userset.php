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
<a href="confirmDelete.php?ID=<?php echo  $_SESSION["online"]; ?>">Xóa</a>

</html>