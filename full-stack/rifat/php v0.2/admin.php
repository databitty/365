<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "data");
if($con === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
	$e = $_POST['email'];
	$p = $_POST['pass'];
	$p = md5($p);
	$sql ="SELECT * FROM `user` WHERE email='$e' AND password='$p'";
$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run))
	{
//here session is used and value of  " $e " store in $_SESSION
	$_SESSION['email']=$e;
	echo "<script>alert('successfully Login ');</script>";
	header("Location: home.php");
	}
	else
	{
		echo "<script>alert('Email or password is incorrect!')</script>";
	}
}
?>



<!DOCTYPE
<html>
<head>
	<title>ADMIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>DATA 365</h1>
	<h3>Make the better app</h3>
<div class="left-side">
	<form action="admin.php" method="POST" >
		  <input type="email" name="email" value="" placeholder="Your@email.com" required/>
		  <br>
		  <input type="password" name="pass" value="" placeholder="***********" required/>
		  <br>
		  <button type="submit" class="btn btn-primary btn-block btn-large" name="submit">SIGN IN</button>
	</form>
</div>

<div class="right-side">
	<form action="admin1.php" method="POST" >
		<table>
			<tr>
				<td><input type="text" name="uname" placeholder="User Name" required /></td>
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
