<!-- author: Harsh Keswani, @therealharsh -->

<?php
	$oldpassword=$_POST['oldpass'];
	$newpassword=$_POST['newpass'];
	$newpasswordagain=$_POST['newpassagain'];
	$user = $_COOKIE['uratsvalidator'];
	
	//echo"$oldpassword<br>$newpassword<br>$newpasswordagain";
	
	$salt = 'insertsalthere'; //salt for password
	$hashold = md5($salt . $oldpassword); //encrypt password using md5
	$hashnew = md5($salt . $newpassword); //encrypt password using md5
	$hashnewagain = md5($salt . $newpasswordagain); //encrypt password using md5
	
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	$sql = "select password from login_tester where username = '$user'";
	$result = mysql_query($sql, $con);
	while($row = mysql_fetch_assoc($result)){
		$curpass = $row['password'];
	}
	
	$sql2= "UPDATE login_tester SET password = '$hashnew'";
	if($hashold == $curpass && $hashnew == $hashnewagain && $hashold != $hashnew){
		mysql_query($sql2, $con);
		header("Location: accountinfo.php");
	}
	else{
		echo"Either passwords didn't match or current password is incorrect";
	}
	
	
?>