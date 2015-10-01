<!-- author: Harsh Keswani, @therealharsh -->

<?php
$id=$_GET['id']; 
$username = $_COOKIE['uratsvalidator'];
$senderResponse=$_POST['name']; //get post
$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
$server_address = $_SERVER['REMOTE_ADDR']; //get IP
$device_info = addslashes($deviceInfo);
$senderRes = addslashes($senderResponse);
$response = strip_tags($senderRes);
$ipaddress = strip_tags($server_address);
$con=mysql_connect("localhost","username", "password") or die(mysql_error());
mysql_select_db("validator");

if($senderResponse == NULL){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
}

$sql="SELECT DISTINCT username from `replies tester` where id in (SELECT id from `replies tester` where id = $id)";
$eq = mysql_query($sql, $con);
$thispostid = uniqid();
$updateInfo = "INSERT INTO  `replies tester` (  `id` ,  `time` ,  `response` ,  `device_info` ,  `sender_ip`, username, post_id) VALUES ($id , NOW( ) , '$response', '$device_info',  '$ipaddress', '$username', '$thispostid');"; //query to insert post into DB

mysql_query($updateInfo, $con);
while($row=mysql_fetch_array($eq)){
	$user_commenters = $row['username'];
	$parttwo = "INSERT into comment_tester (username, id, time, user_isread, post_id, notif_poster) VALUES ('$user_commenters', $id, NOW(), 0, '$thispostid', '$username')";
	mysql_query($parttwo, $con);
}


header('Location: replies.php?id='.$id);
?>