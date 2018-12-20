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
	
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$number = $_POST['number'];

	mysqli_query($db, "UPDATE info SET name='$name', address='$number' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$number = $n['number'];
		}
	}
