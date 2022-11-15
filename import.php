<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

include 'connect.php';
if (isset($_POST["Import"])) {
	echo $filename = $_FILES["file"]["tmp_name"];
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
			//It wiil insert a row to our subject table from our csv file`
			$sql = "INSERT INTO user VALUES ('','$emapData[0]','$emapData[1]','$emapData[2]','','','','','',1)";
			//we are using mysql_query function. it returns a resource on true else False on error
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"content.php\"
						</script>";
			} else {
				$sql3 = "SELECT ID FROM user WHERE Email='$emapData[2]' ";
				$result3 = mysqli_query($conn, $sql3);
				$row3 = mysqli_fetch_array($result3);
				$ID = $row3['ID'];

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

				$mail->addAddress($emapData[2]);

				$mail->isHTML(true);

				$mail->Subject = 'Active account ';

				$bodyContent = '<table border="1"  align="center"><tbody>
				<tr>
				<td>
				<p align="center">Xác nhận kích hoạt tài khoản của bạn: </p>
				<p align="center" ><a  href="localhost/module_user/active.php?ID=' . $ID . '"><input type="button" value="Bấm vào đây để kích hoạt tài khoản" ></a><p>
				</td>
				</tr>
				</tbody></table>';
				$bodyContent .= '';
				$mail->Body    = $bodyContent;
				if (!$mail->send()) {
					$deleteSql = "DELETE FROM user WHERE ID=" . $ID;
					$deleteQuery = mysqli_query($conn, $deleteSql);
				}
			}
		}
		fclose($file);
		//throws a message if data successfully imported to mysql database from excel file
		echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
		//close of connection
		mysqli_close($conn);
	}
}
