<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>tasktrack.io: Login Here!</title>
    <link rel="stylesheet" href="login.css"/>
</head>
<body>
<?php
require('connect.php');
session_start();

if (isset($_POST['email'])) {
    $email = $_REQUEST['email'];
    $email = mysqli_real_escape_string($conn, $email);

    $password = $_REQUEST['password'];
    $password = mysqli_real_escape_string($conn, $password);

    $query    = "SELECT * FROM `accounts` WHERE email='$email'
                     AND password='$password'";
					 
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
	
    if ($rows == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
		
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['lname'] = $row['lname'];
			$_SESSION['college'] = $row['college'];
			$_SESSION['major'] = $row['major'];
		}
        header("Location: tasks.php");
        exit();
    } 
	else {
        echo "<div class='box'>
                  <h3>Incorrect email/password!</h3><br/>
                  <p class='link'>Click <a href='login.php'>here</a> to login again.</p>
                  </div>";
    }
} else {
    ?>
    <form class="box" method="post" name="login">
        <h1 class="login-title">Login Now!</h1>
        <input type="email" class="login-input" name="email" placeholder="email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" style = "font-family: manropeextralight;" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? Click <a href="signup.php">here</a> to sign up!</p>
    </form>
    <?php
}
?>
</body>
</html>