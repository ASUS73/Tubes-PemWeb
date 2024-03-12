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
				<div class="admin-wrapper">
					<form action="" method="post" enctype="multipart/form-data">
						<?php
							include "db.php";

							$id = $_GET["updateid"];
							$sql = "SELECT * FROM users WHERE id='$id'";
							$result = mysqli_query($connect, $sql);
							$row = mysqli_fetch_assoc($result);

							$full_name = $row["full_name"];
							$email = $row["email"];
							$role = $row["role"];
							$alamat = $row["alamat"];
							$mobile_phone = $row["mobile_phone"];

							$tanggal_lahir = $row["tanggal_lahir"];
							$old_password = $row["password"];
							$old_foto = $row["foto_profile"];

							if (isset($_POST['submit'])) {
								$full_name = $_POST["full_name"];
								$email = $_POST["email"];
								$role = $_POST["role"];
								$alamat = $_POST["alamat"];
								$mobile_phone = $_POST["mobile_phone"];
								$password = $_POST["password"];
								$foto_name = $_FILES["foto_profile"]["name"];
								// $foto_size = $_FILES["foto_profile"]["size"];
								// $tmp_name = $_FILES["foto_profile"]["tmp_name"];


								if ($password === "") {
									$password = $old_password;
									$confirm_password = $password;
									$paswordHash = $confirm_password;
								} else {
									$password = $_POST["password"];
									$confirm_password = $_POST["confirm_password"];
									$paswordHash = password_hash($password, PASSWORD_DEFAULT);
								}


								$tanggal_lahir = $_POST["tanggal_lahir"];
								$foto_name = $_FILES["foto_profile"]["name"];
								$foto_size = $_FILES["foto_profile"]["size"];
								$tmp_name = $_FILES["foto_profile"]["tmp_name"];

								$valid_foto_extension = array("jpg","png","jpeg");
								$foto_extension = explode(".", $foto_name);
								$foto_extension = strtolower(end($foto_extension));

								$errors = array();

								if (empty($full_name) AND empty($email) AND empty($alamat) AND empty($tanggal_lahir) AND empty($foto_extension) AND empty($password) AND empty($confirm_password) AND empty($role) AND empty($mobile_phone)) {
									array_push($errors, "All fields are required");
								}

								else if (empty($full_name)) {
									array_push($errors, "The product should not be empty");
								}

								else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
									array_push($errors, "Email is not valid");
								}

								else if (strlen($password)<8) {
									array_push($errors, "Password must be at least a character long");
								}

								else if ($password!==$confirm_password) {
									array_push($errors, "Password does not match");
								}

								else if (empty($role)) {
									array_push($errors, "The role may not be empty");
								}

								else if (empty($alamat)) {
									array_push($errors, "The category may not be empty");
								}

								else if (empty($mobile_phone)) {
									array_push($errors, "The mobile phone may not be empty");
								}

								else if (empty($tanggal_lahir)) {
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
									if (in_array($foto_extension, $valid_foto_extension)) {
										$new_foto_name = uniqid();
										$new_foto_name .= ".".$foto_extension;
										move_uploaded_file($tmp_name, "ImageKaryawan/".$new_foto_name);

										$sql = "UPDATE users SET id='$id', full_name='$full_name', email='$email', password='$paswordHash', role='$role', alamat='$alamat', mobile_phone='$mobile_phone', tanggal_lahir='$tanggal_lahir', foto_profile='$new_foto_name' WHERE id='$id'";
										
										$result = mysqli_query($connect, $sql);
										if ($result) {
											echo "<div class='alert alert-success'>The product was successfully added</div>";
											header("Location: adminKaryawan.php");
										} else {
											die(mysqli_error($connect));
										}
									}
									 else {
										die(mysqli_error($connect));
									}
								}
							}
						?>
						<div class="container">
							<div class="row">
								<div class="col-6 col-sm-6">
									<input type="hidden" name="old_password" value="<?php echo $paswordHash; ?>">
									<div class="form-group">
								    	<label>Nama Karyawan</label>
								    	<input type="text" class="form-control form-control-sm" name="full_name" placeholder="nama..." autocomplete="off" value="<?php echo $full_name; ?>">
								 	</div><br>
								  	<div class="form-group">
								    	<label>Email</label>
								    	<input type="email" class="form-control form-control-sm" name="email" placeholder="email..." autocomplete="off" value="<?php echo $email; ?>">
								  	</div><br>
								  	<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control form-control-sm" name="password" placeholder="password...">
									</div><br>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" class="form-control form-control-sm" name="confirm_password" placeholder="confirm password...">
									</div><br>
									<div class="form-group">
										<label>Role</label>
										<input type="text" class="form-control form-control-sm" name="role" placeholder="role > 1" value="<?php echo $role; ?>">
									</div><br>
									<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					  				<a href="adminKaryawan.php" class="btn btn-danger">Cancel</a>
								</div>
								<div class="col-6 col-sm-6">
									<input type="hidden" name="old_foto" value="<?php echo $row['foto_profile']; ?>">
									<div class="form-group">
										<label>Alamat</label>
										<textarea name="alamat" class="form-control form-control-sm" placeholder="alamat..."><?php echo "$alamat"; ?></textarea>
									</div><br>
									<div class="form-group">
										<label>Nomor Telepon</label>
										<input type="text" class="form-control form-control-sm" name="mobile_phone" placeholder="0XXXXXXXXXX" value="<?php echo $mobile_phone; ?>">
									</div><br>
								  	<div class="form-group">
								    	<label>Tanggal Lahir</label>
								    	<input type="date" class="form-control form-control-sm" name="tanggal_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>">
								  	</div><br>
								 	<div class="form-group">
								    	<label>Foto</label>
								    	<input type="file" class="form-control form-control-sm" name="foto_profile" id="foto_profile">
								 	</div><br>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>