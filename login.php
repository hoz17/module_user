<?php
require "connect.php";
session_start();
?>
<?php
if (isset($_POST['submit'])) {
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

  } else {
    echo "Tài khoản hoặc mật khẩu không đúng !";

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
  <link rel="stylesheet" href="./CSS/login.css">
  <script src="./JS/login.js"></script>
</head>

<body>
  <div class="page">
    <div class="container">
      <div class="left">
        <div class="login">Login</div>
        <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
      </div>
      <div class="right">
        <div class="form">
          <form action="" method="POST">
            <label for="username">Tên Tài Khoản</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mật Khẩu</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" id="submit" name="submit" value="Đăng Nhập">
            <input type="button" onclick="location.href='register.php'" id="register-btn" name="register" value="Đăng Ký">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>