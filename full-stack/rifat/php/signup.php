<?php
session_start();
include 'dbh.php';

$n = $_POST['name'];
$e = $_POST['email'];
$p = $_POST['pass'];

$sql = "INSERT INTO users (name,email,pass) VALUES ('$n','$e','$p')";

$result = $conn->query($sql);

header("Location: index.php");
 
 ?>