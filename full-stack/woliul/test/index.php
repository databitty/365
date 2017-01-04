<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = md5(mysql_real_escape_string($_POST['pass']));
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 while ($row=mysql_fetch_array($res)) {

   if($row['password']==$upass)
   {
    $_SESSION['user'] = $row['user'];
    header("Location: home.php");
   }
   else
   {
    ?>
          <script>alert('wrong details');</script>
          <?php
   }
 }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Welcome Employee Management System</title>
<link rel="stylesheet" href="style2.css" type="text/css">
</head>
<body>
<left>
    <div style="margin-top: 10px; margin-bottom: 50px;" id="body">
    <h5><a style="margin-center: 50px;">Welcome to Employee Mangement System</a>
 </h5></div>
<div style="margin-top: 5px;" id="login-form">
<table style="margin-left: 0px; margin-right: 100px; margin-top: 70px;" align="right" border="0" width="30%">
<tbody></tbody><tbody style="margin-right: 100px;"><tr><td><a><h3>Don't have an account?</h3></a><h6><a href="register.php"></a></h6></td></tr><tr>
<td><a href="register.php"><button type="submit" name="btn-login">Sign Up Here</button></a></td>
</tr>
<tr>
</tr>

</tbody></table><form style="margin-left: 50px;" method="post"><table style="margin-left: 100px;" align="center" border="0" width="30%">
<tbody></tbody><tbody><tr>
<td style="padding-bottom: 15px;"><a style="margin-bottom: 0px;">Email Address</a><input placeholder="your@email.com" style="margin-top: 12px;" name="email" required="" type="text"></td>
</tr>
<tr>
<td style="padding-top: 0px; margin-top: 0px;"><a style="margin-bottom: 0px; margin-top: 0px;">Password</a><input placeholder="•••••••••••" style="margin-top: 12px; border-width: 2px;" name="pass" required="" type="password"></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>

</tbody></table>

</form>
</div>
</left>

</body></html>
