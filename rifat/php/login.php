<?php
session_start();
include 'dbh.php';

$e = $_POST['email'];
$p = $_POST['pass'];

$sql ="SELECT * FROM users WHERE email='$e' AND pass='$p'";

$result = $conn->query($sql);

if (!$row = $result->fetch_assoc()) {
	echo "your username or password is incorrect!";
} else{
	$_SESSION['id'] = $row['id'];
}

///header("Location: index.php");
 
 ?>