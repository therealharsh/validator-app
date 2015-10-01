<!-- author: Harsh Keswani, @therealharsh -->

<?php
$id=$_GET['id'];
$username = $_COOKIE['uratsvalidator'];
	$server_address = $_SERVER['REMOTE_ADDR']; //get IP
	$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
	$con3=mysql_connect("localhost","username", "password") or die(mysql_error());
	mysql_select_db("validator");
	$sqlForIP = "SELECT * from tester where id=$id";
	$eq = mysql_query($sqlForIP,$con3);
	while($row=mysql_fetch_array($eq)){
		$ipaddress = $row['ip_address']; // might need testing
		$device_info = $row['device_info'];
		$usernamedb = $row['username'];
	}
	if($username == $usernamedb){
		$sql = "DELETE FROM `tester` WHERE id = $id";
  		mysql_query($sql,$con3);
  		header("Location: index.php");
  	}
  	else{
  		echo "Don't do that!";
  	}
?>