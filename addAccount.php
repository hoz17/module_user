<?php
session_start();
$ID = $_SESSION['online'];
require "connect.php";

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user VALUES ('',' $username ',' $password ','$email ','','','','','',1)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "alkjsdhakusdh";
    }
}

?>
<form action="" method="POST">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="text" name="email">
    <input type="submit" value="Thêm" name="insert">




</form>