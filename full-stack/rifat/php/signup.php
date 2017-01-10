<?php
session_start();
 $con = mysqli_connect("localhost", "root", "", "data");

 if($con === false){
 	die("ERROR: Could not connect. " . mysqli_connect_error());
 }

if(isset($_POST['submit'])){
 $n = $_POST['name'];
 $e = $_POST['email'];
 $p = md5($_POST['pass']);
 $sql = "INSERT INTO user (username,email,password) VALUES ('$n','$e','$p')";

if(mysqli_query($con, $sql)){
		?>
		<script>alert('successfully Sign Up');</script>
		<?php
	}
else
	{
		?>
		<script>alert('ERROR: Could not able to execute...');</script>
		<?php
	}
}
	mysqli_close($con);
?>
<!DOCTYPE
<html>
<head>
	<title>Database Connection</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>DATA 365</h1>
	<h3>Make the better app</h3>
<div class="left-side">
	<form action="signin.php" method="POST" >
		  <input type="email" name="email" value="" placeholder="Your@email.com" required/>
		  <br>
		  <input type="password" name="pass" value="" placeholder="***********" required/>
		  <br>
		  <button type="submit" class="btn btn-primary btn-block btn-large" name="submit">SIGN IN</button>
	</form>
</div>

<div class="right-side">
	<form action="signup.php" method="POST" >
		<table>
			<tr>
				<td><input type="text" name="name" placeholder="User Name" required /></td>
			</tr>
			<tr>
				<td><input type="email" name="email" placeholder="Your Email" required /></td>
			</tr>
			<tr>
				<td><input type="password" name="pass" placeholder="Your Password" required /></td>
			</tr>
			<tr>
				<td><button type="submit" class="btn btn-primary btn-block btn-large" name="submit">SIGN UP</button></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
