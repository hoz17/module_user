<?php
require "connect.php";
session_start();
?>

<?php
$_SESSION["online"] = "";
header("location:login.php")
?>

</html>