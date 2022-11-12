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
        if ($result)
            echo "<div align='center'><h1>Xóa thành công</h1></div>";
    }
    ?>
    <br>
    <div align="center"><a href="login.php"><input type="submit" value="Trang chủ" name="return"></a></div>
</body>

</html>