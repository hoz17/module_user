<?php
require "connect.php";
session_start();
?>
<?php
if (isset($_POST["register"])) {
    $Username = $_POST["username"];
    $Email = $_POST["email"];
    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];

    $sql = "SELECT * FROM user WHERE Username = '$Username' OR Email='$Email' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count != 0) {
        echo "Tên tài khoản hoặc email đã được đăng ký";
    } else {
        if ($pass1 != $pass2) {
            echo "Đăng ký không thành công, xác nhận mật khẩu không đúng";
        } else {
            $pass = $pass1;
            $sql2 = "INSERT INTO user VALUES ('','$Username','$pass','$Email','','','','','',1)";
            $result2 = mysqli_query($conn, $sql2);

            $sql3 = "SELECT ID FROM user WHERE Email='$Email' ";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_array($result3);
            $ID = $row3['ID'];
            header('location:confirmActive.php?ID=' . $ID);
        }
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
                <div class="register">Register</div>
                <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
            </div>
            <div class="right">
                <div class="form">
                    <form action="" method="POST">
                        <label for="username">Tên Tài Khoản</label>
                        <input type="text" id="username" name="username" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                        <label for="password1">Mật Khẩu</label>
                        <input type="password" name="password1" id="password1" required>
                        <label for="password2">Nhập lại mật Khẩu</label>
                        <input type="password" name="password2" id="password2" required>
                        <br><input type="submit" id="register-btn" name="register" value="Đăng Ký">
                        <input type="button" onclick="location.href='login.php'" id="submit" name="submit" value="Đăng Nhập">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>