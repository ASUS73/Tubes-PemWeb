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
	<link rel="stylesheet" href="style.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="container">
		<h1>Welcome User</h1>
		<a href="logout.php" class="btn btn-danger">Logout</a>
	</div>
</body>
</html>