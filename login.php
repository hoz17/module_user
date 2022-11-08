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
        <h1>Đăng Nhập</h1>
        <div id="login-body">
            <form action="" method="POST">
                <Label class="login-label">Tên Tài Khoản</Label>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <Label class="login-label">Mật Khẩu</Label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="submit" id="login-btn" name="login" value="Đăng Nhập">
                <a href="register.php" id="register-btn" name="register">Đăng Ký</a>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $tk = $_POST['username'];
        $mk = $_POST['password'];
        $sql = "SELECT * FROM user WHERE Username = '$tk' AND Password = '$mk' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            echo "Đăng nhập thành công";
            $_SESSION["online"] = $row['ID'];
            header("location:userset.php");
            // header("location:index.php");
            // setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
        } else {
            echo "Đăng nhập không thành công";
            // header("location:index.php");
            // setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
        }
    }
    ?>
</body>

</html>