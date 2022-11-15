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
    if ($oldPwd != $row['Password']) {
        echo "<script>alert('Mật khẩu cũ không đúng !')</script>";
    } elseif ($newPwd == $row['Password']) {
        echo "<script>alert('Mật khẩu mới trùng mật khẩu cũ !')</script>";
    } elseif ($newPwd != $confirmPwd) {
        echo "<script>alert('Xác nhận mật khẩu không chính xác !')</script>'";
    } else {
        $sql2 = "UPDATE user SET Password='$newPwd' WHERE ID=" . $ID;
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) echo "<script>
        var confirm = confirm('Đổi mật khẩu thành công');
        if (confirm) {
            window.location.href='userset.php';
        }
    </script>";
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
    <link rel="stylesheet" href="./CSS/register.css">
</head>

<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="register">Change Password</div>
                <div class="eula"></div>
            </div>
            <div class="right">
                <div class="form">
                    <form action="" method="POST">
                        <label for="">Nhập mật khẩu cũ: </label>
                        <input type="Password" name="oldPwd" required><br>
                        <label for="">Nhập mật khẩu mới: </label>
                        <input type="password" name="newPwd" id="" required><br>
                        <label for="">Nhập lại mật khẩu: </label>
                        <input type="password" name="confirmPwd" id="" required><br>
                        <input type="submit" value="Đổi mật khẩu" name="change"><br><br>
                        <input type="submit" value="Quay lại" name="back" onclick="window.location='userset.php'">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>