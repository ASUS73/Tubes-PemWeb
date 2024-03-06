<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("Location: login.php");
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
	<title>Admin Profile</title>
</head>
<body>
	<div class="sidebar">
		<div class="logo"></div>
		<ul class="menu">
			<li>
				<a href="admin.php">
					<i class="fa-solid fa-house"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="adminProfile.php">
					<i class="fa-solid fa-user"></i>
					<span>Profile</span>
				</a>
			</li>
			<li>
				<a href="statistic.php">
					<i class="fa-solid fa-square-poll-vertical"></i>
					<span>Statistic</span>
				</a>
			</li>
			<li>
				<a href="addProduct.php">
					<i class="fa-solid fa-boxes-stacked"></i>
					<span>Product</span>
				</a>
			</li>
			<li>
				<a href="settingAdmin.php">
					<i class="fa-solid fa-gear"></i>
					<span>Settings</span>
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
							<img src="./Image/user.jpg" alt="user" width="150">						
						</div>
						<h4>Admin</h4>
						<p>Founder the apotek online shop</p>
					</div>
					<div class="right">
						<div class="admin-info">
							<h3>Information</h3>
							<div class="admin-infodata">
								<div class="admin-data">
									<h4>Email</h4>
									<p>admin@gmail.com</p>
								</div>
								<div class="admin-data">
									<h4>Phone Number</h4>
									<p>0XXX-XXXX-XXXX</p>
								</div>
							</div>
						</div>
						<div class="admin-project">
							<h3>Notes</h3>
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
						<div class="social-media">
							<ul>
								<li><a href="#"><i class="fa-brands fa-square-facebook uniques"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-square-x-twitter uniques"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-square-instagram uniques"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>