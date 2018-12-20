<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$number = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$number = $_POST['number'];

		mysqli_query($db, "INSERT INTO info (name, number) VALUES ('$name', '$number')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}