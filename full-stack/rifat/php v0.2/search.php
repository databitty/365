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
 $i=0;
 while($rows=mysqli_fetch_assoc($record))
 {
 $roll[$i]=$rows['username'];
 $i++;
 }
 $total_elmt=count($roll);

 ?>
<!DOCTYPE
<html>
<head>
	<title>SEARCH PAGE</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
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
  <div align="center">
    <form method="POST" action="">
          <h1 style="color:#F7931E;border-bottom:1px solid #E79258;width:380px;">Search Member Info</h1>
          <select name="select">
          <option>Select</option>
          <?php
          for($j=0;$j<$total_elmt;$j++)
          {?>
            <option><?php echo $roll[$j];?></option>
        <?php
          }?>
          </select>

        <input name="submit" type="submit" value="Search"/>
    </form>
  </div>
  	<h1>Member Data</h1>

<div class="contant">
  		<table id="table" align="center" border="1">
  			<tr>
          <td class="td">Id</td>
          <td class="td">First Name </td>
          <td class="td">Last Name</td>
          <td class="td">User Name</td>
          <td class="td">Email</td>
          <td class="td">Password</td>
          <?php
          if(isset($_POST['submit'])){
            $value=$_POST['select'];
            $sql = "SELECT * FROM members WHERE username='$value'";
            $record=mysqli_query($con,$sql);
            while ($member=mysqli_fetch_array($record)) {
              echo "<tr>
              <td>".$member['user_id']."</td>
              <td>".$member['first_name']."</td>
              <td>".$member['last_name']."</td>
              <td>".$member['username']."</td>
              <td>".$member['email']."</td>
              <td>".$member['password']."</td>
              </tr>";
            }
          }
           ?>
        </tr>
      </table>
</div>
    <div class="footer" style="border-bottom:1px solid #F7931E">...</div>
</body>
</html>
