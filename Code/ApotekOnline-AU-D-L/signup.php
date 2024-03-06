<?php
	session_start();
	if (isset($_SESSION["user"])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Signup</title>
</head>
<body>
	<div class="container">

		<?php 
			if (isset($_POST["submit"])) {
				$fullname = $_POST["fullname"];
				$email = $_POST["email"];
				$role = $_POST["role"];
				$password = $_POST["password"];
				$confirm_password = $_POST["confirm_password"];

				$paswordHash = password_hash($password, PASSWORD_DEFAULT);

				$errors = array();

				if (empty($fullname) OR empty($email) OR empty($password) OR empty($confirm_password)) {
					array_push($errors, "All fields are required");
				}

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					array_push($errors, "Email is not valid");
				}

				if (strlen($password)<8) {
					array_push($errors, "Password must be at least a character long");
				}

				if ($password!==$confirm_password) {
					array_push($errors, "Password does not match");
				}

				require_once "db.php";
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = mysqli_query($connect, $sql);
				$rowCount = mysqli_num_rows($result);

				if ($rowCount>0) {
					array_push($errors, "Email already exits!");
				}

				if (count($errors)>0) {
					foreach ($errors as $error) {
						echo "<div class='alert alert-danger'>$error</div>";
					}
				} else {
					$sql = "INSERT INTO users (full_name, email, password) VALUES (?,?,?)";
					$stmt = mysqli_stmt_init($connect);
					$preparestmt = mysqli_stmt_prepare($stmt, $sql);

					if ($preparestmt) {
						mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $paswordHash);
						mysqli_stmt_execute($stmt);
						echo "<div class='alert alert-success'>You are registered successfully.</div>";
					} else {
						die("Something went wrong.");
					}
				}
			}
		?>

		<form action="signup.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="role" value="0" hidden>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="fullname" placeholder="fullname">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="password">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="confirm_password" placeholder="confirm_password">
			</div>
			<div class="form btn">
				<input type="submit" class="btn btn-primary" value="Register" name="submit">
			</div>
			<a href="login.php">Already have an account? Login</a>
		</form>
	</div>
</body>
</html>