<?php 
	include "db.php";

	if (isset($_GET["deleteid"])) {
		$id = $_GET["deleteid"];

		$sql = "DELETE FROM users WHERE id='$id'";
		$result = mysqli_query($connect, $sql);

		if ($result) {
			header("Location: adminKaryawan.php");
		} else {
			die(mysqli_error($connect));
		}
	}

?>