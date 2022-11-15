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
    echo "<script>
var confirm = confirm('Đổi thông tin thành công. ');
if (confirm) {
      window.location.href='login.php';
  }
</script>";
} else {
    echo "<script>
var confirm = confirm('Đổi thông tin không thành công. ');
if (confirm) {
      window.location.href='login.php';
  }
</script>";
}
