<!-- author: Harsh Keswani, @therealharsh -->

<?php
$postContent=$_POST['name'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
$device_info = addslashes($deviceInfo);
$server_address = $_SERVER['REMOTE_ADDR'];
$contentAddSlash = addslashes($postContent);
$content = strip_tags($contentAddSlash);
$con=mysql_connect("localhost","username", "password") or die(mysql_error());
mysql_select_db("validator");
$updateInfo = "INSERT INTO tester(date, time, content, ip_address, image, image_name, device_info) VALUES (NOW(), CURRENT_TIMESTAMP, '$content', '$server_address', '{$image}', '{$image_name}', '$device_info');";
mysql_query($updateInfo, $con);
header('Location: index.php');
//echo "content: $postContent";
//echo "content1: $content";
//echo "server = $server_address";
//echo "i = $image_name";
?>