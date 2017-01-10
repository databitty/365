<?php
session_start();
if(!isset($_SESSION['email']))
{
  header ("Location: admin.php");
}

 $con = mysqli_connect("localhost", "root", "", "data");

 if($con === false){
 	die("ERROR: Could not connect. " . mysqli_connect_error());
 }
?>

 <!DOCTYPE
 <html>
	 <head>
	 	<title>ADMIN HOME</title>
	 	<link rel="stylesheet" type="text/css" href="style1.css">
	 </head>
	 <body>
	 		<div class="header">
        <a href=""><span>Welcom to Admin_Page</span></a>
			</div>
      <div id="r">
        <a href="admin.php">Logout</a>
      </div>



				<div class="hm">
				     <a href="">Home</a>
				</div>
				<div class="btn">
				<h1>Member</h1>
				<a href="insert.php" class="button1">Insert</a>
				<a href="update.php" class="button2">Update</a>
				<a href="delete.php" class="button3">Delete</a>
				<a href="search.php" class="button4">Search</a>
				</div>


	 </body>
 </html>
