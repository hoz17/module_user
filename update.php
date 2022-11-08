<?php
require "connect.php";
session_start();
?>
<div class="div_center">
    <h1>Sửa Dữ Liệu</h1>
    <?php
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];
    }
    ?>
    <?php
    if (isset($_POST['update'])) {

        $Fullname = $_POST["Fullname"];
        $Birthday = $_POST["Birthday"];
        $Gender = $_POST["Gender"];
        $Adress = $_POST["Adress"];

        $sql = "UPDATE user SET Fullname='$Fullname',Birthday='$Birthday',Gender = '$Gender', Adress='$Adress' WHERE id=" . $_SESSION["online"];
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Sửa thành công";
            header("location: userset.php");
        } else {
            echo "Failed";
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM user WHERE ID = " . $_SESSION["online"];
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    ?>
    <form method="POST" action="">
        <p class="minititle">Họ tên</p><input type="text" name="Fullname" value="<?php echo $rows['Fullname']; ?>" required /><br /><br />
        <p class="minititle">Ngày Sinh</p><input type="date" name="Birthday" value="<?php echo $rows['Birthday']; ?>" required /><br /><br />
        <p class="minititle">Giới Tính</p>
        <input class="radio" type="radio" name="Gender" value="0" <?php if ($rows["Gender"] == 0) echo "checked"; ?> /> Nam <br /><br />
        <input class="radio" type="radio" name="Gender" value="1" <?php if ($rows["Gender"] == 1) echo "checked"; ?> /> Nữ<br /><br />
        <p class="minititle">Địa Chỉ</p>
        <input type="text" name="Adress" value="<?php echo $rows['Adress']; ?>" required /><br /><br />
        <p class="minititle">Nhóm</p>
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
        </select><br /><br />
        <input class="button" type="submit" name="update" value="Sửa">
        <button class="button"><a class="green" href="userset.php">Quay Lại</a></button>
    </form>
</div>