<?php
require("connect.php");

if (isset($_GET["ID"])) $ID = $_GET["ID"];
if (isset($_GET["Fullname"])) $Fullname = $_GET["Fullname"];
if (isset($_GET["Birthday"])) $Birthday = $_GET["Birthday"];
if (isset($_GET["Gender"])) $Gender = $_GET["Gender"];
if (isset($_GET["Address"])) $Address = $_GET["Address"];
if (isset($_GET["Class"])) $Class = $_GET["Class"];

$sql = "UPDATE user SET Fullname='$Fullname',Birthday='$Birthday',Gender = '$Gender', Address='$Address', Class_id='$Class'WHERE id=" . $ID;
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<h1>Sửa thành công</h1>";
    echo "<script type='text/javascript'>alert('Sửa thành công!')</script>";
    echo "<a href='userset.php'><input type='button' value='Trang chủ'></a>";
} else {
    echo "Failed";
}
