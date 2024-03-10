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
	<title>Admin Karyawan</title>
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
		<div class="header-wrapper">
			<div class="header-title">
				<span>Halaman</span>
				<h2>Karyawan</h2>
			</div>
			<div class="user-info">
				<div class="search-box">
					<i class="fa-solid fa-magnifying-glass"></i>
					<input type="text" placeholder="Search...">
				</div>
				<a href="adminProfile.php"><img src="./Image/user.jpg" title="Admin"></a>
			</div>
		</div>
		<div class="card-container">
			<div class="main-title">
				<b>Tambah Karyawan</b>
			</div>
			<div class="card-wrapper">
				<div class="product-container">
					<div class="container">
						<a href="add_adminKaryawan.php" class="btn btn-success" title="Add"><i class="fa-solid fa-user-plus"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="table-wrapper">
			<h1 class="main-title"><b>Data Karyawan</b></h1>
			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Nama Karyawan</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>Nomor Telepon</th>
							<th>Tanggal Lahir</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include "db.php";

							$sql = "SELECT * FROM users";
							$result = mysqli_query($connect, $sql);

							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									if ($row["role"] === "1") {
										continue;
									}
									$id = $row["id"];
									$full_name = $row["full_name"];
									$email = $row["email"];
									$alamat = $row["alamat"];
									$mobile_phone = $row["mobile_phone"];
									$tanggal_lahir = $row["tanggal_lahir"];
									$foto_profile = $row["foto_profile"];
									echo "
										<tr>
											<td>".$full_name."</td>
											<td>".$email."</td>
											<td>".$alamat."</td>
											<td>".$mobile_phone."</td>
											<td>".$tanggal_lahir."</td>
											<td><img src='Image/".$foto_profile."' width='100px'></td>
											<td>
												<button class='btn btn-warning'><a href='editKarAdmin.php?updateid=".$id."' class='text-black' title='Edit'><i class='fa-solid fa-screwdriver-wrench'></i></a></button>
												<button class='btn btn-danger'><a href='deleteKarAdmin.php?deleteid=".$id."' class='text-white' title='Fired!'><i class='fa-solid fa-user-minus'></i></a></button>
											</td>
										</tr>
									";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>