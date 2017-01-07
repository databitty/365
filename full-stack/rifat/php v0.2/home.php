<?php
session_start();
if(!isset($_SESSION['email']))
{
  header ("Location: home.php");
}
session_destroy();
?>
 <!DOCTYPE
 <html>
	 <head>
	 	<title>ADMIN HOME</title>
	 	<link rel="stylesheet" type="text/css" href="style1.css">
	 </head>
	 <body>
	 		<div class="header">
				 <a href="" class="l"><span>Welcom to Admin_Page</span></a>
				 <a href="admin.php" class="r"><span>Logout</span></a>
         <div id="r">
       Hi <?php echo $un; ?><a href="admin.php">LogOut</a>
   </div>
			</div>


				<div class="hm">
				     <a href="">Home</a>
				</div>
				<div class="btn">
				<h1>Member</h1>
				<a href="insert.php" class="button1">Insert</a>
				<a href="#" class="button2">Update</a>
				<a href="delete.php" class="button3">Delete</a>
				<a href="#" class="button4">Search</a>
				</div>


	 </body>
 </html>
