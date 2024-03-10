<?php 
	include "db.php";

	if (isset($_GET["deleteid"])) {
		$id_product = $_GET["deleteid"];

		$sql = "DELETE FROM add_product WHERE id_product='$id_product'";
		$result = mysqli_query($connect, $sql);

		if ($result) {
			header("Location: Product.php");
		} else {
			die(mysqli_error($connect));
		}
	}

?>