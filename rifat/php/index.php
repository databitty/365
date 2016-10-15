<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Database Connection</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>DATA 365</h1>
    <h3>Make the better app</h3>
<form action="login.php" method="POST" >
  Email Address<br>
  <input type="text" name="newname" value="" placeholder="Your@email.com" required/>
  <br>
  Password:<br>
  <input type="password" name="pass1" value="" placeholder="***********" required/>
  <br><br>
  <button>SIGN IN</button>
</form>

<?php
	if (isset($_SESSION['id'])) {
		echo $_SESSION['id'];
	} else{
		echo "You are not logged in !";
	}
?>

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
			<td><button type="submit" name="signup">Sign Up</button></td>
		</tr>
	</table>
</form>
</body>
</html>