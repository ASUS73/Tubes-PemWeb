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
				<a href="Product.php">
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
					<form action="add_product.php" method="post" enctype="multipart/form-data">
						<?php
							include "db.php";

							if (isset($_POST['submit'])) {
								$nama_produk = $_POST["nama_produk"];
								$harga = $_POST["harga"];
								$kategori = $_POST["kategori"];
								$date_exp = $_POST["date_exp"];
								$foto_name = $_FILES["foto_produk"]["name"];
								$foto_size = $_FILES["foto_produk"]["size"];
								$tmp_name = $_FILES["foto_produk"]["tmp_name"];

								$valid_foto_extension = ["jpg","png","jpeg"];
								$foto_extension = explode(".", $foto_name);
								$foto_extension = strtolower(end($foto_extension));

								$errors = array();

								if (empty($nama_produk) AND empty($harga) AND empty($kategori) AND empty($date_exp) AND empty($foto_extension)) {
									array_push($errors, "All fields are required");
								}

								else if (empty($nama_produk)) {
									array_push($errors, "The product should not be empty");
								}

								else if (empty($harga)) {
									array_push($errors, "Prices can't be empty");
								}

								else if (empty($kategori)) {
									array_push($errors, "The category may not be empty");
								}

								else if (empty($date_exp)) {
									array_push($errors, "The expiration date may not be empty");
								}

								else if (!in_array($foto_extension, $valid_foto_extension)) {
									array_push($errors,"Invalid image extension");
								} 

								else if($foto_size > 1000000){
									array_push($errors,"Image size is to large");
								
								} 

								if (count($errors)>0) {
									foreach ($errors as $error) {
										echo "<div class='alert alert-danger'>$error</div>";
									}
								} else {
									$new_foto_name = uniqid();
									$new_foto_name .= ".".$foto_extension;

									move_uploaded_file($tmp_name, "Image/".$new_foto_name);
									$sql = "INSERT INTO add_product (nama_produk, harga, kategori, foto_produk, date_exp) VALUES ('$nama_produk', '$harga', '$kategori', '$new_foto_name', '$date_exp')";
									$result = mysqli_query($connect, $sql);
									if ($result) {
										echo "<div class='alert alert-success'>The product was successfully added</div>";
										header("Location: Product.php");
									} else {
										die(mysqli_error($connect));
									}
								}
							}
						?>
						<div class="form-group">
					    	<label>Nama Produk</label>
					    	<input type="text" class="form-control" name="nama_produk" placeholder="Nama produk" autocomplete="off">
					 	</div><br>
					  	<div class="form-group">
					    	<label>Harga</label>
					    	<input type="Text" class="form-control" name="harga" placeholder="Harga" autocomplete="off">
					  	</div><br>
					  	<div class="form-group">
					    	<label>Kategori</label>
					    	<input type="text" class="form-control" name="kategori"  placeholder="Kategori" autocomplete="off">
					 	</div><br>
					 	<div class="form-group">
					    	<label>Foto Produk</label>
					    	<input type="file" class="form-control" name="foto_produk" id="foto_produk" >
					 	</div><br>
					  	<div class="form-group">
					    	<label>Tanggal Kedaluwarsa</label>
					    	<input type="date" class="form-control" name="date_exp" autocomplete="off">
					  	</div><br>
					  	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					  	<a href="Product.php" class="btn btn-danger">Cancel</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>