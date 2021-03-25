<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href=".css" />
</head>
<body>


<?php

	include('connect.php');
    include("auth_session.php");
	

	include('connect.php');
    include("auth_session.php");
	$id = $_GET['id'];

	$sql = "UPDATE todos SET isdone = 1 WHERE id = '$id'"; 

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header('Location: tasks.php'); 
		exit;
	} else {
		echo "Error completeing record";
	}


?>

</body>
</html>