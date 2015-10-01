<!-- author: Harsh Keswani, @therealharsh -->

<?php
	//gets usernameFrom
	$usernameFrom = $_COOKIE['uratsvalidator'];
	$id=$_GET['id']; 
	$messageRaw=$_POST['message']; 
	$message = addslashes($messageRaw);
	
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	
	//gets usernameTo
	$getUsernameTo="select username from tester where $id = id";
	$eq1=mysql_query($getUsernameTo,$con);
	while($row=mysql_fetch_array($eq1)){
		$usernameTo = $row['username'];
	}
	
	//get chatnameFrom
	$getChatnameFrom="select chatname from login_tester where username = '$usernameFrom'";
	$eq2=mysql_query($getChatnameFrom,$con);
	while($row=mysql_fetch_array($eq2)){
		$chatnameFrom = $row['chatname'];
	}
	
	//get chatnameTo
	$getChatnameTo="select chatname from login_tester where username = '$usernameTo'";
	$eq3=mysql_query($getChatnameTo,$con);
	while($row=mysql_fetch_array($eq3)){
		$chatnameTo = $row['chatname'];
	}
	
	$threadcombo = "$usernameFrom, $usernameTo";
	$threadcombo2 = "$usernameTo, $usernameFrom";
	
	$crethread_id = uniqid();
	
	$updateThreads = "INSERT INTO `thread_tester`(`user1`, `user2`, `threadcombo`, chatname_from, chatname_to, `thread_id`) VALUES ('$usernameFrom', '$usernameTo', '$threadcombo', '$chatnameFrom', '$chatnameTo', '$crethread_id')";
	
	
	
	//check for thread so we can create a new one if old doesnt exist
	$countThreadNullity = "SELECT count(*) FROM `thread_tester` WHERE threadcombo = '$threadcombo' OR threadcombo = '$threadcombo2'";
	$result = mysql_query($countThreadNullity) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
	    foreach($row as $cname => $cvalue){
	    	$counter = $cvalue;
	    }
	}
	
	if($counter == 0){
		mysql_query($updateThreads, $con);
	}
	
	//add message along with thread base components
	$threadchecker = "select * from thread_tester where threadcombo = '$threadcombo' OR threadcombo = '$threadcombo2'";
	$eq4=mysql_query($threadchecker,$con);
	while($row=mysql_fetch_array($eq4)){
		$thread_id = $row['thread_id'];
		$threader = $row['threadcombo'];
	}
	
	$sendMessage = "INSERT INTO `message_tester`(`chatname_from`, `chatname_to`, `username_from`, `username_to`, `message`, `post_id`, `date`, `read_nullity`, `threadcombo`, thread_id) VALUES ('$chatnameFrom', '$chatnameTo', '$usernameFrom', '$usernameTo', '$message', $id, NOW(), 0, '$threader', '$thread_id')";
	mysql_query($sendMessage, $con);
			
	
	
	header("Location: chat.php?id=".$id);
	
	
?>