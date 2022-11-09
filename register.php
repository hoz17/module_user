<?php
require "connect.php";
session_start();
?>
<!DOCTYPE>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
</head>

<body>
    <div id="login">
        <h1>Đăng Ký</h1>
        <div id="login-body">
            <form action="" method="POST">
                <Label class="login-label">Tên Tài Khoản <br></Label>
                <input type="text" id="username" name="username" placeholder="Username" required><br>
                <Label class="login-label">Email <br></Label>
                <input type="text" id="email" name="email" placeholder="Email" required><br>
                <Label class="login-label">Mật Khẩu <br> </Label>
                <input type="password" id="password1" name="password1" placeholder="Password" required><br>
                <Label class="login-label">Xác Thực Mật Khẩu <br> </Label>
                <input type="password" id="password2" name="password2" placeholder="Password" required>
                <br><input type="submit" id="register-btn" name="register" value="Đăng Ký">
            </form>
        </div>
    </div>
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
                $sql2 = "INSERT INTO user VALUES ('','$Username','$pass','$Email','','','','','',3,'')";
                $result2 = mysqli_query($conn, $sql2);

                $sql3 = "SELECT ID FROM user WHERE Email='$Email' ";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
                $ID=$row3['ID'];
                header('location:confirmActive.php?ID='.$ID);
            }
        }
    }
    ?>
</body>

</html>