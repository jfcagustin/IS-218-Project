<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tasktrack.io: Tasks</title>
	<link rel="stylesheet" href="tasks.css"/>
	<!--<link rel="icon" href="/favicon.png">-->
    <script type="text/javascript" src="validation.js"></script>
</head>
<!--<header><a style = ""href="tasks.php"><img src="logo.png"></a></header>-->
<body>

<form class="logout" style="position: absolute; top:2%; right:2%;">
<p><img src="user.png" style="vertical-align: middle;"><?php
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
  border-radius: 210px;
  transition: 0.25s;
  cursor: pointer;
  font-family: manropeextralight;">
</form>

<div class="welcome">
<h1>Hey, <?php
require('connect.php');
include('auth_session.php');
echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>! Welcome to tasktrack.io!</h1>
</div>

<h2>To-Do:</h2>

<?php
require('connect.php');
include('auth_session.php');

$email = $_SESSION['email'];

if(isset($_SESSION["email"])) {
    $query = "SELECT * FROM todos WHERE isdone=0 && owneremail='$email' ORDER BY duedate ASC";
    $result = mysqli_query($conn, $query);

    echo '<table class="roundedCorners" bordercolor="black" border=6 bgcolor="#272635" style="color:white"> 
            <tr>
            <th style="padding: 2px 4px;">Task Title</th>
            <th style="padding: 2px 4px;">Description</th>
            <th style="padding: 2px 4px;">Due Date</th>
			<th style="padding: 2px 4px;">Actions</th>

</tr>';

while($rows = mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td style='padding: 2px 10px;'>".$rows['tasktitle']."</td>";
	echo "<td style='padding: 2px 10px;'>".$rows['message']."</td>";
	echo "<td style='padding: 2px 10px;'>".$rows['duedate']."</td>";
	echo "<td><a href='delete.php?id=".$rows['id']."'>Delete</a> <a href='edit.php?id=".$rows['id']."'>Edit</a> <a href='complete.php?id=".$rows['id']."'>Complete</a></td>"; 
	echo "</tr>";
}


}

?>

<?php
    $query = "SELECT * FROM todos WHERE isdone=1 && owneremail='$email' ORDER BY duedate ASC";
    $result = mysqli_query($conn, $query);

    echo '<table class="roundedCorners" bordercolor="black" border=6 bgcolor="#272635" style="color:white">
            <tr>
            <th style="padding: 2px 4px;">Task Title</th>
            <th style="padding: 2px 4px;">Description</th>
            <th style="padding: 2px 4px;">Due Date</th>
			<th style="padding: 2px 4px;">Actions</th>
</tr>';
?>
<?php echo "<a href='add.php".$rows['id']."'>Add New Task</a>"; ?>
<h2 style="margin-top: 4em; ">Completed:</h2>

<?php

while($rows = mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td style='padding: 2px 10px;'>".$rows['tasktitle']."</td>";
	echo "<td style='padding: 2px 10px;'>".$rows['message']."</td>";
	echo "<td style='padding: 2px 10px;'>".$rows['duedate']."</td>";
	echo "<td><a href='delete.php?id=".$rows['id']."'>Delete</a> <a href='edit.php?id=".$rows['id']."'>Edit</a> <a href='incomplete.php?id=".$rows['id']."'>Incomplete</a></td>"; 
	echo "</tr>";
}
?>

</body> 

</html>