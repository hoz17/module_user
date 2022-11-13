<?php
session_start();
require("connect.php");
$ID = $_SESSION['online'];

$sql = "SELECT Password FROM user WHERE ID=" . $ID;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['change'])) {
    $oldPwd = $_POST['oldPwd'];
    $newPwd = $_POST['newPwd'];
    $confirmPwd = $_POST['confirmPwd'];
    if ($oldPwd = $row['Password']) {
        echo "Mật khẩu mới trùng mật khẩu cũ";
    } elseif ($newPwd != $confirmPwd) {
        echo "Xác nhận mật khẩu không khớp";
    } else {
        $sql2 = "UPDATE user SET Password=" . $newPwd;
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) echo "Đổi mật khẩu thành công";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <label for="">Nhập mật khẩu cũ: </label><input type="Password" name="oldPwd"><br>
        <label for="">Nhập mật khẩu mới: </label><input type="password" name="newPwd" id=""><br>
        <label for="">Nhập lại mật khẩu: </label><input type="password" name="confirmPwd" id=""><br>
        <input type="submit" value="Đổi mật khẩu" name="change">
    </form>

</body>

</html>