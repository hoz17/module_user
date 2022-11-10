<?php
require "connect.php";
session_start();
?>
<!-- <!DOCTYPE>
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
    </div> -->
    <?php
    if (isset($_POST['login'])) {
        $tk = $_POST['username'];
        $mk = $_POST['password'];
        $sql = "SELECT * FROM user WHERE Username = '$tk' AND Password = '$mk' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            if ($row['Status'] == 0) {
                echo "Vui lòng kích hoạt tài khoản của bạn.";
            } elseif ($row['Status'] == 2) {
                echo "Tài khoản của bạn hiện đang bị khóa.<br>Vui lòng liên hệ admin để biết thêm chi tiết.";
            } else {
                echo "Đăng nhập thành công";
                $_SESSION["online"] = $row['ID'];
                if ($row['Status'] == 1)
                    header("location:userset.php");
                else header("location:adminset.php");
            }
            // header("location:index.php");
            // setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
        } else {
            echo "Tài khoản hoặc mật khẩu không đúng !";
            // header("location:index.php");
            // setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
        }
    }
    ?>
<!-- </body>

</html> -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
        <label for="email">Email</label>
        <input type="email" id="email" name="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" id="submit" name="login" value="Submit">
      </div>
    </div>
  </div>
</div>

</body>
</html>