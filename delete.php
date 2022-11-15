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