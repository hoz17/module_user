<?php
require 'connect.php';

if (isset($_GET["ID"])) $ID = $_GET["ID"];
if (isset($_GET["Fullname"])) $Fullname = $_GET["Fullname"];
if (isset($_GET["Birthday"])) $Birthday = $_GET["Birthday"];
if (isset($_GET["Gender"])) $Gender = $_GET["Gender"];
if (isset($_GET["Address"])) $Address = $_GET["Address"];
if (isset($_GET["Class"])) $Class = $_GET["Class"];

$sql = "SELECT * FROM user WHERE ID ='$ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['Username'];

$sql2 = "SELECT * FROM class";
$result2 = mysqli_query($conn, $sql2);
while ($row2 = mysqli_fetch_array($result2)) {
    if ($row['Class'] = $row2['ID']) $Classid1 = $row2['Class_name'];
    if ($Class = $row2['ID']) $Classid2 = $row2['Class_name'];
}

if ($Gender == 0) $GT2 = "Nam";
else $GT2 = "Nữ";
if ($row['Gender'] == 0) $GT1 = "Nam";
else $GT1 = "Nữ";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sn9920021@gmail.com';
$mail->Password = 'gycxywxgpyvtcyal';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('sn9920021@gmail.com', 'Managing Software');
$mail->addReplyTo('sn9920021@gmail.com', 'Managing Software');

$mail->addAddress($row['Email']);

$mail->isHTML(true);

$mail->Subject = 'Change Information';

$bodyContent = '<table border="1"  align="center"><tbody>
<tr>
<td>
<p align="center">Xác nhận thay đổi thông tin tài khoản của bạn: </p>
<p align="center">Xin chào ' . $name . ' </p>
<table align="center">
<tbody>
<tr>
<th align="center">Thông tin</th>
<th align="center">Trước<th>
<th align="center">Sau</th>
<tr>
<tr>
<td>Họ và tên</td>
<td>' . $row["Fullname"] . '</td>
<td>' . $Fullname . '</td>
</tr>
<tr>
<td>Ngày sinh</td>
<td>' . $row["Birthday"] . '</td>
<td>' . $Birthday . '</td>
</tr>
<tr>
<td>Giới tính</td>
<td>' . $GT1 . '</td>
<td>' . $GT2 . '</td>
</tr>
<tr>
<td>Địa chỉ</td>
<td>' . $row["Address"] . '</td>
<td>' . $Address . '</td>
</tr>
<tr>
<td>Nhóm</td>
<td>' . $Classid1 . '</td>
<td>' . $Classid2 . '</td>
</tr>
</tbody>
</table>
<p align="center" ><a  href="localhost/module_user/changeInfor.php?ID=' . $ID . '&Fullname=' . $Fullname . '&Birthday=' . $Birthday . '&Gender=' . $Gender . '&Address=' . $Address . '&Class=' . $Class . '"><input type="button" value="Bấm vào đây để xác nhận thay đổi thông tin tài khoản" ></a><p>
</td>
</tr>
</tbody></table>';
$bodyContent .= '';
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo "<script>
var confirm = confirm('Gửi thư xác nhận không thành công. Mã lỗi:  $mail->ErrorInfo ');
if (confirm) {
      window.location.href='login.php';
  }
</script>";
    //echo '<div  align="center">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
} else {
    echo "<script>
var confirm = confirm('Thư xác nhận đã được gửi đến địa chỉ mail của bạn.Vui lòng bấm vào liên kết để xác nhận thay đổi. ');
if (confirm) {
      window.location.href='login.php';
  }
</script>";
}
