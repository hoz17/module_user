<?php
require "connect.php";
session_start();
$IDSession = $_SESSION["online"];
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
        $Address = $_POST["Address"];
        $Class = $_POST["cboClass"];
        $Status = $_POST["cboStatus"];
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        $Email = $_POST["Email"];

        $sql = "UPDATE user SET Fullname='$Fullname',Birthday='$Birthday',Gender = '$Gender', Address='$Address', Class_id='$Class' , Username='$Username', Password='$Password', Status='$Status'WHERE id=" . $ID;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql4 = "SELECT Status FROM user WHERE ID = '$IDSession'";
            $result4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($result4);
            if ($row4['Status'] == 3) {
                header("location:adminset.php");
                echo "<script type='text/javascript'>alert('Sửa thành công!')</script>";
            } elseif ($row4['Status'] == 1) {
                header("location:userset.php");
                echo "<script type='text/javascript'>alert('Sửa thành công!')</script>";
            }
        } else {
            echo "Failed";
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM user WHERE ID = '$ID'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    ?>
    <form method="POST" action="">
        <script>
            function showPwd() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <p class="minititle">Username</p><input type="text" name="Username" value="<?php echo $rows['Username']; ?>" <?php if ($rows['Status'] != 3) echo 'readonly'; ?> /><br /><br />
        <p class="minititle">Password</p><input type="password" id="myInput" name="Password" value="<?php echo $rows['Password']; ?>" required /><input type="checkbox" onclick="showPwd()" name="" id="">Hiện mật khẩu<br /><br />
        <p class="minititle">Email</p><input type="text" name="Email" value="<?php echo $rows['Email']; ?>" required /><br /><br />
        <p class="minititle">Trạng thái</p>
        <select name="cboStatus" id="cboStatus">
            <option value="0" <?php if ($rows['Status'] == 0) echo "selected"; ?>>Chưa kích hoạt</option>
            <option value="1" <?php if ($rows['Status'] == 1) echo "selected"; ?>>User</option>
            <option value="2" <?php if ($rows['Status'] == 2) echo "selected"; ?>>Blocked</option>
            <option value="3" <?php if ($rows['Status'] == 3) echo "selected"; ?>>Admin</option>
        </select><br /><br />
        <p class="minititle">Họ tên</p><input type="text" name="Fullname" value="<?php echo $rows['Fullname']; ?>" required /><br /><br />
        <p class="minititle">Ngày Sinh</p><input type="date" name="Birthday" value="<?php echo $rows['Birthday']; ?>" required /><br /><br />
        <p class="minititle">Giới Tính</p>
        <input class="radio" type="radio" name="Gender" value="0" <?php if ($rows["Gender"] == 0) echo "checked"; ?> /> Nam <br /><br />
        <input class="radio" type="radio" name="Gender" value="1" <?php if ($rows["Gender"] == 1) echo "checked"; ?> /> Nữ<br /><br />
        <p class="minititle">Địa Chỉ</p>
        <input type="text" name="Address" value="<?php echo $rows['Address']; ?>" required /><br /><br />
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
                        $select = "";
                        if ($rows['Class_id'] == $row['ID']) $select = "selected";
                        echo "<option " . $select . " value = '" . $row["ID"] . "' >" . $row['Class_name'] . "</option>";
                    }
                }
            }
            ?>
        </select><br /><br />
        <input class="button" type="submit" name="update" value="Sửa">
        <button class="button"><a class="green" href="
        <?php
        $sql4 = "SELECT Status FROM user WHERE ID = '$IDSession'";
        $result4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($result4);
        if ($row4['Status'] == 3) echo "adminset.php";
        elseif ($row4['Status'] == 1) echo "userset.php";
        ?>">Quay Lại</a></button>
    </form>
</div>