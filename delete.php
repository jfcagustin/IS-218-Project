<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Task</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>


<?php

	include('connect.php');
    include("auth_session.php");
	$id = $_GET['id'];

	$sql = "DELETE FROM todos WHERE id = $id"; 

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header('Location: tasks.php'); //If book.php is your main page where you list your all records
		exit;
	} else {
		echo "Error deleting record";
	}

?>
</body>
</html>