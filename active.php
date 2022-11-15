<?php
session_start();
require 'connect.php';
if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];
    $sql = "UPDATE user SET Status=1 WHERE ID ='$ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div align='center'><h1>Kích hoạt thành công</h1></div>";
        echo "<div align='center'><a href='login.php'><input type='button' value='Đăng nhập'></a></div><br>";
        echo "<div align='center'><a href='update.php?ID=" . $ID . "'><input type='button'value='Sửa thông tin'></a></div>";
    } else {
        echo "<div align='center'><h1>Kích hoạt không thành công</h1></div>";
    }
}
