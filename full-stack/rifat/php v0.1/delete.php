<?php
session_start();
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
    echo "<script>alert('successfully Deleted');</script>";
      header("Location: delete.php");
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
