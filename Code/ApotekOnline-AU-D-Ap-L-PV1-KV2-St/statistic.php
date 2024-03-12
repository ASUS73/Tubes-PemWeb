<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("Location: login.php");
	}

	$dataPoints = array( 
		array("y" => 10, "label" => "Senin" ),
		array("y" => 15, "label" => "Selasa" ),
		array("y" => 30, "label" => "Rabu" ),
		array("y" => 35, "label" => "Kamis" ),
		array("y" => 20, "label" => "Jum'at" ),
		array("y" => 40, "label" => "Sabtu" ),
		array("y" => 10, "label" => "Minggu" )
	);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script>
		window.onload = function() {
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Data Penjualan"
			},
			axisY: {
				title: ""
			},
			data: [{
				type: "column",
				yValueFormatString: "## Produk",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		}
	</script>
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
				<a href="Product.php">
					<i class="fa-solid fa-boxes-stacked"></i>
					<span>Product</span>
				</a>
			</li>
			<li>
				<a href="adminKaryawan.php">
					<i class="fa-solid fa-user-tie"></i>
					<span>Employee</span>
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
				<div class="container">
					<div class="row">
						<div class="col-6 col-sm-6">
							<div id="chartContainer" style="height: 370px; width: 100%;"></div>
							<script src="./assets/js/canvasjs.min.js"></script>
							<div class="container mt-5">
								<div class="row">
									<div class="col-6 col-sm-6">
										<div class="cardStat-payment">
											<div class="cardStat-header">
												<div class="amountStat">
													<span class="titleStat">
														<b>Total Produk</b>
													</span>
													<span class="amountStat-value">
														-
													</span>
												</div>
												<i class="fa-solid fa-box-open icon"></i>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6">
										<div class="cardStat-payment">
											<div class="cardStat-header">
												<div class="amountStat">
													<span class="titleStat">
														<b>Total Karyawan</b>
													</span>
													<span class="amountStat-value">
														-
													</span>
												</div>
												<i class="fa-solid fa-users icon"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm-6">
							<div class="container" style="padding-left: 60px;">
								<iframe src="https://calendar.google.com/calendar/embed?src=55814739a7204ca1f430720e51a3ad5d36f4ebff01b153432eb17908efd7ca29%40group.calendar.google.com&ctz=Asia%2FJakarta" style="border: 0" width="425" height="500" frameborder="0" scrolling="no"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>