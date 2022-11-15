<?php
/* <script>
var confirm = confirm("sample message?");
if(confirm) {
    // index page
    window.location.url = ""; // your url index page
 } else {
    // other page
    window.location.url = ""; // your url other page
 }
</script> */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa tài khoản</title>
</head>

<body>
    <?php
    require "connect.php";
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];
        $sql = "DELETE FROM user WHERE  ID =' $ID'";
        $result = mysqli_query($conn, $sql);
        $noti = "#";
        mysqli_close($conn);
        if ($result) {
            echo "<script>
           var confirm = confirm('Xóa thành công');
           if (confirm) {
               window.location.href='adminset.php';
           }
       </script>";
        }
    }
    ?>
</body>

</html>