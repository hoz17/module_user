<?php
require "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="searchbar">
        <select name="cboClass" id="cboClass">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "module_user");
            if (!$conn) {
                echo "Ket noi khong thanh cong";
                exit();
            } else {
                $sql2 = "select * from class";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {
                        echo "<option value = '" . $row["ID"] . "'>" . $row["Class_name"] . "</option>";
                    }
                }
            }
            ?>
        </select>
        <input type="submit" value="Tìm kiếm" name="search">
        <a href="logout.php?ID=<?php echo  $_SESSION["online"]; ?>" onclick="return confirm('Are you sure you want to logout?')">Đăng Xuất</a><br>
    </form>
    <?php
    if (isset($_POST["search"])) {
        $s = $_POST["searchbar"];
        $Class = $_POST["cboClass"];
        if ($s == "") {
            echo "Không được để trống";
            echo "<a href='adminset.php';>Home</a>";
        } else {
            $sql = "SELECT user.ID,user.Username,user.Password, user.Email, user.Status, user.Fullname, user.Birthday, user.Gender, User.Address, class.Class_name FROM user,class WHERE user.Class_id=class.ID AND (Username LIKE '%$s%' OR Email LIKE '%$s%' OR Class_id='$Class') ORDER BY user.ID";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if ($count <= 0) {
                echo "Khong tim thay ket qua phu hop";
                echo "<a href='index.php';>Home</a>";
            } else {
                echo "Tim thay " . $count . " ket qua voi tu khoa";
    ?>
                <table>
                    <tbody>
                        <tr>
                            <th></th>
                            <th>ID</td>
                            <th>Username</td>
                            <th>Password</td>
                            <th>Email</td>
                            <th>Status</td>
                            <th>Fullname</td>
                            <th>Birthday</td>
                            <th>Gender</td>
                            <th>Address</td>
                            <th>Class</td>
                            <th><a href="addAccount.php.php">Thêm</a></th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td> <input type="checkbox" name="checkbox" id="" value="<?php echo $row['ID']; ?>"></td>
                                <td><?php echo $row["ID"]; ?></td>
                                <td><?php echo $row["Username"]; ?></td>
                                <td><?php echo $row["Password"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><?php switch ($row["Status"]) {
                                        case 0:
                                            echo "Chưa kích hoạt";
                                            break;
                                        case 1:
                                            echo "User";
                                            break;
                                        case 2:
                                            echo "Blocked";
                                            break;
                                        case 3:
                                            echo "Admin";
                                            break;
                                        default:
                                            break;
                                    }
                                    ?></td>
                                <td><?php echo $row["Fullname"]; ?></td>
                                <td><?php echo $row["Birthday"]; ?></td>
                                <td><?php if($row["Gender"]==0)echo"Nam";else echo"Nữ"; ?></td>
                                <td><?php echo $row["Address"]; ?></td>
                                <td><?php echo $row["Class_name"]; ?></td>
                                <td><a href="update.php?ID=<?php echo $row['ID']; ?>">Sửa</a> |<a href="delete.php?ID=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure you want to delete?')"> Xóa </a> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    <?php echo "<a href='adminset.php';>Home</a>";
            }
        }
    } else require "content.php"; ?>
</body>

</html>