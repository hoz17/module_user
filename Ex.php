<!DOCTYPE html>
<?php
require 'connect.php';
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Import Excel To Mysql Database Using PHP </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Import Excel File To MySql Database Using php">

	<link rel="stylesheet" href="./booststrap/bootstrap.min.css">
	<link rel="stylesheet" href="./booststrap/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="./booststrap/bootstrap-custom.css">


</head>

<body>

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To Mysql Database Using PHP</a>
			</div>
		</div>
	</div>
	<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span3 hidden-phone"></div>
				<div class="span6" id="form-login">
					<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend>Import CSV/Excel file</legend>
							<div class="control-group">
								<div class="control-label">
									<label>CSV/Excel File:</label>
								</div>
								<div class="controls">
									<input type="file" name="file" id="file" class="input-large">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="span3 hidden-phone"></div>
			</div>
			<table class="table table-bordered">
				<thead>
				<tbody>
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
					</tr>
					</thead>
					<?php
					$SQLSELECT = "SELECT * FROM user,class WHERE user.Class_id=class.ID  ";
					$result_set =  mysqli_query($conn, $SQLSELECT,);
					while ($row = mysqli_fetch_array($result_set)) {
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
						</tr>
					<?php
					}
					?>
			</table>
		</div>

	</div>
</body>

</html>