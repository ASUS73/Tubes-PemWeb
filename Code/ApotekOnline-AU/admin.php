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
	<title>Admin dashboard</title>
</head>
<body>
	<div class="sidebar">
		<div class="logo"></div>
		<ul class="menu">
			<li>
				<a href="#">
					<i class="fa-solid fa-house"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-user"></i>
					<span>Profile</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-square-poll-vertical"></i>
					<span>Statistic</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-toolbox"></i>
					<span>Careers</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-clipboard-question"></i>
					<span>Question</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-star"></i>
					<span>Testimonial</span>
				</a>
			</li>
			<li>
				<a href="#">
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
		<div class="header-wrapper">
			<div class="header-title">
				<span>Primary</span>
				<h2>Dashboard</h2>
			</div>
			<div class="user-info">
				<div class="search-box">
					<i class="fa-solid fa-magnifying-glass"></i>
					<input type="text" placeholder="Search...">
				</div>
				<img src="./Image/user.jpg">
			</div>
		</div>
		<div class="card-container">
			<div class="main-title">
				<b>Today's data</b>
			</div>
			<div class="card-wrapper">
				<div class="card-payment">
					<div class="card-header">
						<div class="amount">
							<span class="title">
								<b>Payment</b>
							</span>
							<span class="amount-value">
								Rp.5.756.000
							</span>
						</div>
						<i class="fa-solid fa-money-bill-wave icon"></i>
					</div>
					<span class="card-detail">
						**** **** **** 3244
					</span>
				</div>
				<div class="card-payment">
					<div class="card-header">
						<div class="amount">
							<span class="title">
								<b>Total product</b>
							</span>
							<span class="amount-value">
								Rp.5.756.000
							</span>
						</div>
						<i class="fa-solid fa-box-open icon"></i>
					</div>
					<span class="card-detail">
						**** **** **** 3244
					</span>
				</div>
				<div class="card-payment">
					<div class="card-header">
						<div class="amount">
							<span class="title">
								<b>Customer</b>
							</span>
							<span class="amount-value">
								Rp.5.756.000
							</span>
						</div>
						<i class="fa-solid fa-user-group icon"></i>
					</div>
					<span class="card-detail">
						**** **** **** 3244
					</span>
				</div>
				<div class="card-payment">
					<div class="card-header">
						<div class="amount">
							<span class="title">
								<b>Total sales</b>
							</span>
							<span class="amount-value">
								Rp.5.756.000
							</span>
						</div>
						<i class="fa-solid fa-cart-flatbed icon"></i>
					</div>
					<span class="card-detail">
						**** **** **** 3244
					</span>
				</div>
			</div>
		</div>
		<div class="table-wrapper">
			<h1 class="main-title"><b>Finance data</b></h1>
			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Date</th>
							<th>Transaction Type</th>
							<th>Name Product</th>
							<th>Amount</th>
							<th>Category</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2024-02-17</td>
							<td>Credit Card</td>
							<td>Paracetamol</td>
							<td>Rp.250.000</td>
							<td>Syrup Medicene</td>
							<td>Pending</td>
							<td><button>Edit</button></td>
						</tr>
						<tr>
							<td>2024-02-17</td>
							<td>Credit Card</td>
							<td>Paracetamol</td>
							<td>Rp.250.000</td>
							<td>Syrup Medicene</td>
							<td>Pending</td>
							<td><button>Edit</button></td>
						</tr>
						<tr>
							<td>2024-02-17</td>
							<td>Credit Card</td>
							<td>Paracetamol</td>
							<td>Rp.250.000</td>
							<td>Syrup Medicene</td>
							<td>Pending</td>
							<td><button>Edit</button></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="7">Total: Rp.750.000</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</body>
</html>