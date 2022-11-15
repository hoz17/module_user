<?php
if (isset($_GET["ID"]))
    $ID = $_GET["ID"];
require 'connect.php';
$sql = "SELECT Email FROM user WHERE ID ='$ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

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

$mail->Subject = 'Confirm delete ?';

$bodyContent = '<table border="1"  align="center"><tbody>
<tr>
<td>
<p align="center">Xác nhận xóa tài khoản của bạn: </p>
<p align="center">Xin chào </p>' . $row['Email'] . '
<p align="center" ><a  href="localhost/module_user/delete.php?ID=' . $ID . '"><input type="button" value="Bấm vào đây để xóa" ></a><p>
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
    var confirm = confirm('Thư xác nhận đã được gửi đến địa chỉ mail của bạn.Vui lòng bấm vào liên kết để xác nhận xóa tài khoản. ');
    if (confirm) {
          window.location.href='login.php';
      }
    </script>";
}
