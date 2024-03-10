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
	<title>Login</title>
</head>
<body>
	<div class="container">

		<?php
			if (isset($_POST["login"])) {
				$email = $_POST["email"];
				$password = $_POST["password"];

				require_once "db.php";
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = mysqli_query($connect, $sql);
				$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

				if ($user) {
					if (password_verify($password, $user["password"])  && $user["role"] == 1) {
						session_start();
						$_SESSION["user"] = "yes";
						header("Location: admin.php");
						die();

					} else if(password_verify($password, $user["password"]) && $user["role"] == 0) {
						session_start();
						$_SESSION["user"] = "yes";
						header("Location: user.php");
						die();

					} else {
						echo "<div class='alert alert-danger'>Password does not match</div>";
					}
				} else {
					echo "<div class='alert alert-danger'>Email does not match</div>";
				}
			}
		?>

		<form action="login.php" method="post">
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Enter your email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Enter your password">
			</div>
			<div class="form btn">
				<input type="submit" class="btn btn-primary" value="Login" name="login"> 
			</div>
			<a href="signup.php">Not account yet? Signup</a>
		</form>
	</div>
</body>
</html>