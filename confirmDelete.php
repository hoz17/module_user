<?php
session_start();
$ID = $_SESSION["online"];
/* if (isset($_GET["ID"])) {
	$ID = $_GET["ID"];
} */

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

$mail->addAddress('sn992002@gmail.com');

$mail->isHTML(true);

$mail->Subject = 'Confirm delete ?';

$bodyContent = '<table border="1"  align="center"><tbody>
<tr>
<td>
<p align="center">Xác nhận xóa tài khoản của bạn: </p>
<p align="center" ><a  href="localhost/demo/project/delete.php?ID=' . $ID . '"><input type="button" value="Bấm vào đây để xóa" ></a><p>
</td>
</tr>
</tbody></table>';
$bodyContent .= '';
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="delete.php"></a>
    <input type="button" value="Bấm vào đây để xóa" link="localhost/demo/project1/index.php">
</body>
</html>
 -->