<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tasktrack.io: Sign Up Now!</title>
	<link rel="stylesheet" href="signup.css">
</head>
<body>
<?php
require('connect.php');

if (isset($_REQUEST['email'])){

    $email = $_REQUEST['email'];
    $email = mysqli_real_escape_string($conn, $email);

    $password = $_REQUEST['password'];
    $password = mysqli_real_escape_string($conn, $password);

    $fname = $_REQUEST['fname'];
    $fname = mysqli_real_escape_string($conn, $fname);

    $lname = $_REQUEST['lname'];
    $lname = mysqli_real_escape_string($conn, $lname);

    $college = $_REQUEST['college'];
    $college = mysqli_real_escape_string($conn, $college);

    $major = $_REQUEST['major'];
    $major = mysqli_real_escape_string($conn,$major);

    $query    = "INSERT into `accounts` (fname, lname, email, password, college, major)
                     VALUES ('$fname', '$lname', '$email', '$password', '$college', '$major')";
    $result = mysqli_query($conn,$query);

    if($result){
        echo "<div class='box'>
                <h3>Signup successful!</h3>
                <br/>Click <a href='login.php'>here</a> to login!</div>";
    }

}else{
    ?>
	

    <section>
    <div class="form">
        <form id="form" class="box" name="signup" action="" method="post">
			<h1>tasktrack.io</h1>
			<h1 class="createaccount">Create Account!</h1>
			<a href="https://www.facebook.com/"><img src="facebookicon.png" alt="Facebook"></a>
            <a href="https://www.linkedin.com/"><img src="linkedin.png" alt="LinkedIn" ></a>
            <a href="https://www.gmail.com/"><img src="gmail.png" alt="Gmail"></a>
            <p class="register">or use your email to register</p>
            <input id="fname" name="fname" type="text"  pattern="[a-zA-Z][a-zA-Z ]{1,}" title="Numbers not allowed" placeholder="Enter your first name" required><br>
            <input id="lname" name="lname" type="text" pattern="[a-zA-Z][a-zA-Z ]{1,}" title="Numbers not allowed" placeholder="Enter your last name" required><br>
            <input id="email" type="email" name="email" placeholder="Enter a valid email address" required><br>
            </label><input id="password" type="password" name="password" pattern="(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{1,}" title="Enter a password with 1 special character" placeholder="Enter a password with 1 special character" required><br>
            </label><input id="college" name="college" type="text" placeholder="Enter the college you attend" required><br>
            <input id="major" name="major" type="text" placeholder="Enter the major you are studying" required><br>
            <input type="submit" class="button" name="submit" onsubmit="validate()" value="Sign up!" style = "font-family: manropeextralight;">
			<h5> Already have a TaskTrack.io account? Click <a href='login.php' >here</a> to login and to access your tasks!</h5>
        </form>

    </div>
	</section>

<?php } ?>

</body>
</html>