<?php
	session_start();
 $con = mysqli_connect("localhost", "root", "", "data");

 if($con === false){
 	die("ERROR: Could not connect. " . mysqli_connect_error());
 }
if(isset($_POST['submit'])){
 $fn =($_POST['fname']) ;
 $ln = $_POST['lname'];
 $un = $_POST['name'];
 $e = $_POST['email'];
 $p = md5($_POST['pass']);
 $sql = "INSERT INTO `members`(first_name,last_name,username,email,password) VALUES ('$fn','$ln','$un','$e','$p')";

 if(mysqli_query($con, $sql)){
 	echo "<script>alert('Successfully Data Inserted ');</script>";
 }
 else{

	 echo "<script>alert('Duplicate entry  $un  for key username');</script>";
 }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>MEMBER INSERT</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="header">
  <a href="admin.php"> LogOut</a>
</div>

<div class="center">
  <ul class="menu">
    <li><a style="margin-left:270px" href="home.php">Home</a></li>
    <li><a href="insert.php">Insert</a></li>
    <li><a href="update.php">Updat</a></li>
    <li><a href="delete.php">Delete</a></li>
    <li><a href="search.php">Search</a></li>
  </ul>
</div>
<div id="h"><h1>Add New Member</h1> </div>
<form id="table" action="insert.php" method="POST">
	<table align="center" id="tb">
	   <tr>
		<td><input type="text" name="fname" placeholder="First Name" required /></td>
	   </tr>
	   <tr>
		<td><input type="text" name="lname" placeholder="Last Name" required /></td>
	   </tr>

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
		<td><button type="submit" class="btn btn-primary btn-block btn-large" name="submit">SUBMIT</button></td>
	   </tr>
	</table>
</form>
</body>
</html>
