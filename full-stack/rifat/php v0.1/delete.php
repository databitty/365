<?php
session_start();
if(!isset($_SESSION['email']))
{
  header ("Location: admin.php");
}
?>

<?php
$con = mysqli_connect("localhost", "root", "", "data");

if($con === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

 $sql="SELECT * FROM members";
 $record=mysqli_query($con,$sql);
 ?>
<!DOCTYPE
<html>
<head>
	<title>ADMIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
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
  <div align="center" style="margin-top:60px;margin-bottom:60px">
    <form action="delete.php" method="POST" >
  		<table>
  			<tr>
  				<td><input type="text" name="name" placeholder="Enter Name" required /></td>
  			</tr>
  			<tr>
  				<td><button type="submit" class="btn btn-primary btn-block btn-large" name="submit">DELETE</button></td>
  			</tr>
  		</table>
  	</form>
  </div>
  	<h1>Member Data</h1>
    <?php

    if(isset($_POST['submit']))
    {
    $name=$_POST['name'];


    $sql = "DELETE FROM members WHERE username='$name'";
    $record=mysqli_query($con,$sql);
    echo "<script>alert('Successfully Deleted!');</script>";
    }


    ?>

<div class="contant">
  <div>
  		<table id="table" align="center" border="1" width="850px">
  			<tr>
  				<td class="td">Id</td>
          <td class="td">First Name </td>
          <td class="td">Last Name</td>
          <td class="td">User Name</td>
          <td class="td">Email</td>
          <td class="td">Password</td>

          <?php
              while ($member=mysqli_fetch_assoc($record)) {
                echo "<tr>
                <td>".$member['user_id']."</td>
                <td>".$member['first_name']."</td>
                <td>".$member['last_name']."</td>
                <td>".$member['username']."</td>
                <td>".$member['email']."</td>
                <td>".$member['password']."</td>
                </tr>";
              }
           ?>
        </tr>
      </table>
  </div>
</div>
</body>
</html>
