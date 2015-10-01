<!-- author: Harsh Keswani, @therealharsh -->

<?php
	$user = $_COOKIE['uratsvalidator'];
	$chatname=strtolower($_POST['chatname']); //get username	
	$con=mysql_connect("localhost","username", "password") or die(mysql_error());
	mysql_select_db("validator");
	$sql = "UPDATE login_tester SET chatname = '$chatname' where username = '$user'"; 
	$sql2 = "UPDATE login_tester SET chat_nullity = 1 where username = '$user'";
	mysql_query($sql, $con); 
	mysql_query($sql2, $con); 
	header("Location: messages.php")
?>