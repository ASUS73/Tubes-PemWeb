<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("Location: login.php");
	}

	include "db.php";
	$id = $_SESSION["id"];

	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($connect, $sql);

	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["id"];
			$full_name = $row["full_name"];
			$email = $row["email"];
			$mobile_phone = $row["mobile_phone"];
			$foto_profile = $row["foto_profile"];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="styleAdmin.css">
	<style type="text/css">
		#admin-text {
			text-align: justify;
		}
	</style>
	<title>Karyawan Profile</title>
</head>
<body>
	<div class="sidebar">
		<div class="logo"></div>
		<ul class="menu">
			<li>
				<a href="karyawan.php">
					<i class="fa-solid fa-house"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="karyawanProfile.php">
					<i class="fa-solid fa-user"></i>
					<span>Profile</span>
				</a>
			</li>
			<li>
				<a href="karyawanProduct.php">
					<i class="fa-solid fa-boxes-stacked"></i>
					<span>Product</span>
				</a>
			</li>
			<li>
				<a href="logout.php">
					<i class="fa-solid fa-arrow-right-from-bracket"></i>
					<span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="main-content">
		<div class="cardprofile-container">
			<div class="mainprofile-title">
				<div class="admin-wrapper">
					<div class="left">
						<div class="admin-frame">
							<img src="./ImageKaryawan/<?php echo $foto_profile ?>" alt="user" width="150">						
						</div>
						<h4><?php echo $full_name ?></h4>
						<p>Employee in apotek online shop</p>
					</div>
					<div class="right">
						<div class="admin-info">
							<h3>Information</h3>
							<div class="admin-infodata">
								<div class="admin-data">
									<h4>Email</h4>
									<p><?php echo $email; ?></p>
								</div>
								<div class="admin-data">
									<h4>Phone Number</h4>
									<p><?php echo $mobile_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="admin-project">
							<h3>Worker Notes</h3>
							<div class="admin-projectdata">
								<div class="admin-data">
									<p id="admin-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>