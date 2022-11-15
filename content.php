<table>
    <tr>
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
        <th><a href="addAccount.php">Thêm</a></th>
    </tr>
    <?php
    $sql = "SELECT user.ID,user.Username,user.Password, user.Email, user.Status, user.Fullname, user.Birthday, user.Gender, User.Address, class.Class_name FROM user,class WHERE user.Class_id=class.ID ORDER BY user.ID";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
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
            <td><?php if ($row["Gender"] == 0) echo "Nam";
                else echo "Nữ"; ?></td>
            <td><?php echo $row["Address"]; ?></td>
            <td><?php echo $row["Class_name"]; ?></td>
            <td><a href="update.php?ID=<?php echo $row['ID']; ?>">Sửa</a> |<a id="btxoa" href="delete.php?ID=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure you want to delete?')"> Xóa </a> </td>
        </tr>

    <?php
    }
    ?>
</table>