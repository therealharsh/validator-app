<!-- author: Harsh Keswani, @therealharsh -->

<?php
	$usernameFrom = $_COOKIE['uratsvalidator'];
	$threadID=$_GET['thread_id']; 
	$id = NULL;
	$messageRaw=$_POST['message']; 
	$message = addslashes($messageRaw);
	
	
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	
	$getUsernameTo="select DISTINCT username_from from message_tester where thread_id = '$threadID' AND username_to = '$usernameFrom' AND username_from != '$usernameFrom'";
	$eq1=mysql_query($getUsernameTo,$con);
	while($row=mysql_fetch_array($eq1)){
		$usernameTo = $row['username_from'];
	}
	
	$getChatnameFrom="select chatname from login_tester where username = '$usernameFrom'";
	$eq2=mysql_query($getChatnameFrom,$con);
	while($row=mysql_fetch_array($eq2)){
		$chatnameFrom = $row['chatname'];
	}
	
	$getChatnameTo="select chatname from login_tester where username = '$usernameTo'";
	$eq3=mysql_query($getChatnameTo,$con);
	while($row=mysql_fetch_array($eq3)){
		$chatnameTo = $row['chatname'];
	}
	
	$threadcombo = "$usernameFrom, $usernameTo";
	$threadcombo2 = "$usernameTo, $usernameFrom";
	
	$threadchecker = "select * from thread_tester where threadcombo = '$threadcombo' OR threadcombo = '$threadcombo2'";
	$eq4=mysql_query($threadchecker,$con);
	while($row=mysql_fetch_array($eq4)){
		$threader = $row['threadcombo'];
	}
	
	$sendMessage = "INSERT INTO `message_tester`(`chatname_from`, `chatname_to`, `username_from`, `username_to`, `message`, `post_id`, `date`, `read_nullity`, `threadcombo`, thread_id) VALUES ('$chatnameFrom', '$chatnameTo', '$usernameFrom', '$usernameTo', '$message', 0, NOW(), 0, '$threader', '$threadID')";
		mysql_query($sendMessage, $con);
			
	
	
	header("Location: thread.php?thread_id=".$threadID);
?>