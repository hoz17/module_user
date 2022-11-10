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
<div class="greeting">Xin chào
    <?php
    $sql = "SELECT Fullname FROM user WHERE ID=" . $_SESSION['online'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['Fullname'];
    ?></div>
<a href="update.php?ID=<?php echo  $_SESSION["online"]; ?>">Sửa</a>
<p></p>
<a href="logout.php?ID=<?php echo  $_SESSION["online"]; ?>" onclick="return confirm('Are you sure you want to logout?')">Đăng Xuất</a>
<a href="confirmDelete.php?ID=<?php echo  $_SESSION["online"]; ?>" onclick="return confirm('Email xác nhận đã được gửi đến địa chỉ của bạn')">Xóa</a>

</html>