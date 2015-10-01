<!-- author: Harsh Keswani, @therealharsh -->

<?php
$username = $_COOKIE['uratsvalidator'];
$con=mysql_connect("localhost","username", "password") or die(mysql_error());
mysql_select_db("validator");
$sql = "UPDATE `replies tester` SET isread = 2 where id in (SELECT id from tester where username = '$username') AND username != '$username'";
mysql_query($sql, $con);
header("Location: notifications.php");
?>