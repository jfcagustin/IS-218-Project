<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tasktrack.io: Edit Task</title>
    <link rel="stylesheet" href="edit.css" />
</head>
<body>
<form class="logout" style="position: absolute; top:2%; right:2%;">
<p><img src="user.png" style="vertical-align: middle; margin-right: 3px;"><?php
require('connect.php');
include('auth_session.php');
echo $_SESSION['lname'] . ', ' . $_SESSION['fname']; ?></p>
<input type="submit" class="button" name="logout" value="Logout" formaction="logout.php" style="border:0;
  background: #272635;
  display: block;
  margin: auto;
  text-align: center;
  border: 2px solid black;
  padding: 7px 20px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
  font-family: manropeextralight;">
</form>
<?php

	include('connect.php');
    include("auth_session.php");
	$id = $_GET['id'];
	$query = mysqli_query($conn,"select * from todos where id='$id'"); 
	$data = mysqli_fetch_array($query); 

	
	if(isset($_POST['update'])) 
	{
		$tasktitle = $_POST['tasktitle'];
		$description = $_POST['message'];
		$duedate = $_POST['duedate'];
		
		$edit = mysqli_query($conn,"update todos set tasktitle='$tasktitle', message='$description', duedate='$duedate' where id='$id'");
		
		if($edit)
		{
			mysqli_close($conn); 
			header("location:tasks.php"); 
			exit;
		}
		else
		{
			echo mysqli_error();
		}    	
	}

?>
<form class="box" method="POST">
	<h3>Edit Task</h3>
  <input type="text" name="tasktitle" value="<?php echo $data['tasktitle'] ?>" placeholder="Enter Task Title" Required>
  <input type="text" name="message" value="<?php echo $data['message'] ?>" placeholder="Enter Description" Required>
  <input type="datetime-local" name="duedate" value="<?php echo $data['duedate'] ?>" placeholder="Enter Due Date" Required>
  <input type="submit" name="update" value="Update" style = "font-family: manropeextralight;">

</form>
</body>
</html>