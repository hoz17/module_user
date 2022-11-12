<label for="">Nhập mật khẩu cũ: </label><input type="Password" name="oldPwd"><br>
<label for="">Nhập mật khẩu mới: </label><input type="password" name="newPwd" id=""><br>
<label for="">Nhập lại mật khẩu: </label><input type="password" name="confirmPwd" id=""><br>
<input type="submit" value="" name="pwd">

<?php
session_start();
require("connnect.php");
$ID = $_SESSION['online'];

$sql = "SELECT Password FROM user WHERE ID=" . $ID;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$oldPwd = $_POST['oldPwd'];
$newPwd = $_POST['newPwd'];
$confirmPwd = $_POST['confirmPwd'];
if (isset($_POST("pwd"))) {
    if ($oldPwd = $row['Password']) {
    }
}

?>