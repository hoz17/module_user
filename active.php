<?php
session_start();
require 'connect.php';
if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];
    $sql = "UPDATE user SET Status=1 WHERE ID ='$ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
        var confirm = confirm('Kích hoạt thành công!');
        if (confirm) {
              window.location.href='login.php';
          }
        </script>";
    } else {
        echo "<script>
        var confirm = confirm('Kích hoạt không thành công!');
        if (confirm) {
              window.location.href='login.php';
          }
        </script>";
    }
}
