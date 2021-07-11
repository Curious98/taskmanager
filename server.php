<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'week3');

	// initialize variables
	$title = "";
	$details = "";
	$id = 0;
	$update = false;
//saving a new record into the database
	if (isset($_POST['save'])) {
		$title = $_POST['title'];
		$details = $_POST['details'];

		mysqli_query($db, "INSERT INTO task (title, details) VALUES ('$title', '$details')"); 
		$_SESSION['message'] = "Task Added"; 
		header('location: index.php');
	}

// updating the database record
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$details = $_POST['details'];

	mysqli_query($db, "UPDATE task SET title='$title', details='$details' WHERE id=$id");
	$_SESSION['message'] = "Task updated!"; 
	header('location: index.php');
	}
	//deleting a record from the database
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM task WHERE id=$id");
	$_SESSION['message'] = "task deleted!"; 
	header('location: index.php');
	}
	?>