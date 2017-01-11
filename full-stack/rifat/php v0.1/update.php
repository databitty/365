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
 <?php
 if (isset($_POST['update'])) {
     $fn =($_POST['fname']) ;
     $ln = $_POST['lname'];
     $un = $_POST['name'];
     $e = $_POST['email'];
     $p = md5($_POST['pass']);

      $sql="UPDATE members SET first_name='$fn',last_name='$ln',username='$un',email='$e',password='$p' WHERE `username`=$un";
     if (mysql_query($con,$sql)) {
         ?>

         <script>alert('Successfully Updated ');</script>
         <?php
     } else {
         ?>
         <script>alert('Not Updated...');</script>
         <?php
     }
 }
  ?>
<!DOCTYPE
<html>
<head>
 <title>SEARCH PAGE</title>
 <link rel="stylesheet" type="text/css" href="update.css">
</head>
<body>
 <div class="header">
   <a href="admin.php"> LogOut</a>
 </div>

 <div class="center">
   <ul class="menu">
     <li><a style="margin-left:270px" href="home.php">Home</a></li>
     <li><a href="insert.php">Insert</a></li>
     <li><a href="update.php">Update</a></li>
     <li><a href="delete.php">Delete</a></li>
     <li><a href="search.php">Search</a></li>
   </ul>
 </div>
 <div align="center">
   <form method="POST" action="">
         <h1 style="color:#ED1E79;border-bottom:1px solid #E79258;width:380px;">Update Member Info</h1>
         <select name="select">
         <option>User</option>
         <?php
         for($j=0;$j<$total_elmt;$j++)
         {?>
           <option><?php echo $roll[$j];?></option>
       <?php
         }?>
         </select>

       <button name="submit" type="submit" value="Select">select</button>
   </form>
 </div>
   <h1>Member Data</h1>
   <?php
               if(isset($_POST['submit'])){
               $value=$_POST['select'];
               $sql = "SELECT * FROM members WHERE username='$value'";
               $record=mysqli_query($con,$sql);
               $member=mysqli_fetch_array($record);}?>
<div class="contant">
  <form id="table" action="insert.php" method="POST">
      <table align="center" id="tb">

            <tr><td>Fast Name:<input type='text' name='fname' value='<?php echo $member['first_name'] ?>'/></td></tr>
            <tr><td>Last Name:<input type='text' name='lname' value='<?php echo $member['last_name'] ?>'/></td></tr>
            <tr><td>User Name:<input type=text name=name value='<?php echo $member['username'] ?>'/></td></tr>
            <tr><td>Email :<input type=text name=email style=margin-left:62px; value='<?php echo $member['email'] ?>'/></td></tr>
            <tr><td>Password:<input type=text name=pass value='<?php echo $member['password'] ?>'/></td></tr>
            <tr><td><input type='submit' name='update' style="margin-left:62px;" value='update'/></td></tr>

      </table>
  </form>
</div>
   <div class="footer" style="border-bottom:1px solid #F7931E">...</div>
</body>
</html>
