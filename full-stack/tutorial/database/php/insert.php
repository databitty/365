<?php
session_start();

include_once 'dbconnect.php';

if (isset($_POST['btn-signup'])) {
    $uid = $_POST['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $uname = ($_POST['uname']);
    $email = ($_POST['email']);
    $upass = ($_POST['pass']);

    if (mysql_query("INSERT INTO `users`(`user_id`, `username`, `email`, `password`, `firstname`, `lastname`, `age`) VALUES('$uid','$uname','$email','$upass','$fname','$lname','$age')")) {
        ?>
        <script>alert('successfully registered ');</script>
        <?php
    } else {
        ?>
        <script>alert('error while registering you...');</script>
        <?php
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html class="" xmlns="http://www.w3.org/1999/xhtml" lang=""><head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Insert any Data in Database</title>
</head>
<body>

<div id="cssmenu">
<ul>
    <li><a href="home.php">Home</a></li>
   <li class="active"><a href="insert.php">Insert</a></li>
   <li><a href="update.php">Update</a></li>
   <li><a href="delete.php">Delete</a></li>
   <li><a href="search.php">Search</a></li>
</ul>
</div>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Welcome to Employee mangement Project </title>
<link rel="stylesheet" href="stylei.css" type="text/css">

<div id="header">
	<div id="left">
    <label>Employee Management</label>
    </div>
    <div id="right">
    	<div id="content">
            hi <?php session_start();
echo $_SESSION ['user'];?><a href="logout.php?logout"> Sign Out</a>
        </div>
    </div>
</div>
<div style="margin-top: 50px;" id="body">
	<a>Insert Database</a>
    
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Insert any Data in Database</title>
        <link rel="stylesheet" href="stylei.css" type="text/css">

    
    
        <center>
            <div style="margin-top: 40px;" id="login-form">
                <form method="post">
                    <table align="center" border="0" width="30%">
                         <tbody><tr>
                            <td><input name="uid" placeholder="User ID" required="" type="text"></td>
                        </tr>
                        <tr>
                            <td><input name="uname" placeholder="User Name" required="" type="text"></td>
                        </tr>
                        <tr>
                            <td><input name="fname" placeholder="First Name" required="" type="text"></td>
                        </tr>
                        <tr>
                            <td><input name="lname" placeholder="Last Name" required="" type="text"></td>
                        </tr>
                        <tr>
                            <td><input name="age" placeholder="User Age" required="" type="text"></td>
                        </tr>
                        <tr>
                            <td><input name="email" placeholder="User Email" required="" type="email"></td>
                        </tr>
                        <tr>
                            <td><input name="pass" placeholder="User Password" required="" type="password"></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="btn-signup">Insert</button></td>
                        </tr>
                    </tbody></table>
                </form>
            </div>
        </center>
    

   
  </div>
    

</body></html>