<!-- author: Harsh Keswani, @therealharsh -->

<?php
$cid=$_GET['id']; 
$username = $_COOKIE['uratsvalidator'];
$con=mysql_connect("localhost","username", "password") or die(mysql_error());
mysql_select_db("validator");
$sql = "UPDATE `replies tester` SET isread = 2 where comment_id = $cid";
mysql_query($sql, $con);
header("Location: notifications.php");
?>