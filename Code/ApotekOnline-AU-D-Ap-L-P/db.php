<?php 
	$host_name = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "login_register";

	$connect = mysqli_connect($host_name, $db_user, $db_pass, $db_name);

	if (!$connect) {
		die("Databases is not connected!!!");
	}
?>