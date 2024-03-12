<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("Location: login.php");
	}

	include "db.php";

	$sql = "SELECT * FROM users";
	$result = mysqli_query($connect, $sql);

	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["id"];
			$full_name = $row["full_name"];
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
	<title>Karyawan Product</title>
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
				<a href="karyawanSetting.php">
					<i class="fa-solid fa-gears"></i>
					<span>Setting</span>
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
				<h2>Produk</h2>
			</div>
			<div class="user-info">
				<div class="search-box">
					<i class="fa-solid fa-magnifying-glass"></i>
					<input type="text" placeholder="Search...">
				</div>
				<a href="karyawanProfile.php"><img src="./ImageKaryawan/<?php echo $foto_profile ?>" title="<?php echo $full_name ?>"></a>
			</div>
		</div>
		<div class="card-container">
			<div class="main-title">
				<b>Tambah Produk</b>
			</div>
			<div class="card-wrapper">
				<div class="product-container">
					<div class="container">
						<a href="karyawanAddProduct.php" class="btn btn-success">Add</a>
					</div>
				</div>
			</div>
		</div>
		<div class="table-wrapper">
			<h1 class="main-title"><b>Data Produk</b></h1>
			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Kategori</th>
							<th>Tanggal Kedaluwarsa</th>
							<th>Foto Produk</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include "db.php";

							$sql = "SELECT * FROM add_product";
							$result = mysqli_query($connect, $sql);

							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$id_product = $row["id_product"];
									$nama_produk = $row["nama_produk"];
									$harga = number_format($row["harga"], 0, ",", ".");
									$kategori = $row["kategori"];
									$date_exp = $row["date_exp"];
									$foto_produk = $row["foto_produk"];
									echo "
										<tr>
											<td>".$nama_produk."</td>
											<td>Rp ".$harga."</td>
											<td>".$kategori."</td>
											<td>".$date_exp."</td>
											<td><img src='ImageProduk/".$foto_produk."' width='100px'></td>
											<td>
												<button class='btn btn-warning'><a href='editProKaryawan.php?updateid=".$id_product."' class='text-black' style='text-decoration:none'>Edit</a></button>
												<button class='btn btn-danger'><a href='deleteProAdmin.php?deleteid=".$id_product."' class='text-white' style='text-decoration:none')'>Hapus</a></button>
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