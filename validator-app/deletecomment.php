<!-- author: Harsh Keswani, @therealharsh -->

<?php
$commentid=$_GET['id'];
$username = $_COOKIE['uratsvalidator'];
	$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
	$con=mysql_connect("localhost","username", "password") or die(mysql_error());
	mysql_select_db("validator");
	$sqlForIP = "SELECT * FROM `replies tester` WHERE comment_id = $commentid";
	$eq = mysql_query($sqlForIP,$con);
	while($row=mysql_fetch_array($eq)){
		$device_info = $row['device_info'];
		$id = $row['id'];
		$usernamedb = $row['username'];
		if($username == $usernamedb){
		$sql = "DELETE FROM `replies tester` WHERE comment_id = $commentid";
		$sql2 = "UPDATE comment_tester SET user_isread = 1 where post_id in (SELECT post_id from `replies tester` where comment_id = $commentid)";
		mysql_query($sql2,$con);
  		mysql_query($sql,$con);
  		//echo "it works";
  		header('Location: replies.php?id='.$id);
  	}
  	else{
  		echo "Don't do that!";
  	}
  }
?>