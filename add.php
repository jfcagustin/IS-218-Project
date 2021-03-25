<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tasktrack.io: Add Task</title>
    <link rel="stylesheet" href="add.css" />
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
	
	if(isset($_POST['add'])) {
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];
		
		$tasktitle = $_POST['tasktitle'];
		$tasktitle = mysqli_real_escape_string($conn, $tasktitle);
		$_SESSION['tasktitle'] = $tasktitle;
		
		$description = $_POST['message'];
		$description = mysqli_real_escape_string($conn, $description);
		$_SESSION['message'] = $description;
		
		$duedate = $_POST['duedate'];
		$duedate = date("Y-m-d H:i:s",strtotime($duedate));
        $duedate = mysqli_real_escape_string($conn, $duedate);
		$_SESSION['duedate'] = $duedate;
		
		$query1 = "INSERT INTO todos (`owneremail`, `ownerid`, `duedate`, `tasktitle`, `message`, `isdone`) VALUES ('$email', '$id', '$duedate', '$tasktitle', '$description', 0)";
		
		$result = mysqli_query($conn, $query1);
		
		if($result){
			mysqli_close($conn); 
			header("location:tasks.php"); 
			exit;
		}
		else{
			echo mysqli_error();
		}    	
	}

?>


<form class="box" method="POST">
	<h3>Add Task</h3>
  <input type="text" name="tasktitle" value="<?php echo $data['tasktitle'] ?>" placeholder="Enter Task Title" Required>
  <input type="text" name="message" value="<?php echo $data['message'] ?>" placeholder="Enter Description" Required>
  <input type="datetime-local" name="duedate" value="<?php echo $data['duedate'] ?>" placeholder="Enter Due Date" Required>
  <input type="submit" name="add" value="Add Task" style = "font-family: manropeextralight;">
</form>
</body>
</html>