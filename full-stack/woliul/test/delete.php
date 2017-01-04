<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Delete Member Data in Database</title>
</head>
<body>

<div id='cssmenu'>
<ul>
    <li><a href='home.php'>Home</a></li>
   <li><a href='insert.php'>Insert</a></li>

   <li class='active'><a href='delete.php'>Delete</a></li>
   <li><a href='search.php'>Search</a></li>
</ul>
</div>

</body>
<html><html class="" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Welcome to Employee mangement Project </title>
<link rel="stylesheet" href="styled.css" type="text/css">
</head>
<div id="header">
	<div id="left">
    <label>Employee Management</label>
    </div>
    <div id="right">
    	<div id="content">
             Hi <?php session_start();
echo $_SESSION ['user'];echo " ";?><a href="logout.php?logout"> Sign Out</a>
        </div>
    </div>
</div>
<div id="body">

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login & Registration System</title>
        <link rel="stylesheet" href="styled.css" type="text/css" />

    </head>
    <body>
        <center>
            <div id="login-form">
                <form method="post">
                    <h4> Delete Member</h8><br>
                    <h5> Delete Data using Username </p>

                    <table align="center" width="30%" border="0">
                         <?php

$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("dbtest",$connect_mysql) or die ("Could not Connect to Database");
$query = "SELECT * FROM member";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$name[$i]=$rows['username'];
$i++;
}
$total_elmt=count($name);
?>
<form method="POST" action="">
    <h6>Select the Name to Delete:</h6> <select name="sel">
<option>Select</option>
<?php
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php
echo $name[$j];
?></option><?php
}
?>
</select><br />

<input name="submit" type="submit" value="Delete"/><br />

</form>
<?php

if(isset($_POST['submit']))
{
$name=$_POST['sel'];


$query = "DELETE FROM users WHERE username='$name'";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
echo "Successfully Deleted!";
}


?>
                    </table>
                </form>
            </div>
        </center>
    </body>
</html>

  </section></div>


</body></html>
