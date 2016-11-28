<?php
	session_start();
 $link = mysqli_connect("localhost", "root", "", "signup");

 if($link === false){
 	die("ERROR: Could not connect. " . mysqli_connect_error());
 }


 $sql = "INSERT INTO users (name,email,pass) VALUES ('$n','$e','$p')";

 if(mysqli_query($link, $sql)){
 	echo "Records added successfully.";
 } 
 else{

	echo "ERROR: Could not able to execute $sql. " .
	mysqli_error($link);
 }

mysqli_close($link);
?>