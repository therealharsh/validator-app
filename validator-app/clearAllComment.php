<!-- author: Harsh Keswani, @therealharsh -->

<?php
$username = $_COOKIE['uratsvalidator'];
$con=mysql_connect("localhost","username", "password") or die(mysql_error());
mysql_select_db("validator");
$sql = "UPDATE `comment_tester` SET user_isread = 2 where username = '$username'";
mysql_query($sql, $con);
header("Location: notifications.php");
?>