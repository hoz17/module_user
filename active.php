<?php
require 'connect.php';
if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];
    $sql = "UPDATE user SET Status=1 WHERE ID ='$ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div align='center'><h1>Kích hoạt thành công</h1></div>";
    } else {
        echo "<div align='center'><h1>Kích hoạt không thành công</h1></div>";
    }
}
