<?php
require "connect.php";
session_start();
$sql = "UPDATE user SET Status='2'WHERE id=" . $_SESSION['online'];
$result = mysqli_query($conn, $sql);
$_SESSION["online"] = "";
header("location:login.php");
