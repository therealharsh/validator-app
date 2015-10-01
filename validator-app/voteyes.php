<!-- author: Harsh Keswani, @therealharsh -->

<?php
function contains($needle, $haystack)
{
return strpos($haystack, $needle) !== false;
}
?>
<?php
$yes = "validated";
$id=$_GET['id']; 
$username = $_COOKIE['uratsvalidator'];

$server_address = $_SERVER['REMOTE_ADDR']; //get IP
$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
$con=mysql_connect("localhost","username", "password") or die(mysql_error());

mysql_select_db("validator");
$sqlForUser = "SELECT * from tester where id=$id";
$eq = mysql_query($sqlForUser,$con3);
while($row=mysql_fetch_array($eq)){
$voterIP = $row['voter_ip']; // might need testing
$voterUser = $row['voter_user'];

if(contains($username, $voterUser)){
header('Location: index.php');
}
else{
$sql = "UPDATE tester SET numYes = numYes + 1 WHERE id=$id"; //query to insert vote into DB
$sql2 = "UPDATE tester SET voter_ip =CONCAT('$server_address , ', voter_ip) where id=$id";
$sql3 = "UPDATE tester SET final_vote = '$yes' WHERE id=$id";
$sql4 = "UPDATE tester SET voter_user = CONCAT('$username , ', voter_user) where id=$id";
mysql_query($sql,$con);
mysql_query($sql2,$con);
mysql_query($sql3,$con);
mysql_query($sql4, $con);
header('Location: index.php#'.$id);
}
}
?>