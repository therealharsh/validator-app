<!-- author: Harsh Keswani, @therealharsh -->

<?php
	$id=$_GET['id'];
	$con=mysql_connect("localhost","username", "password") or die(mysql_error());
	mysql_select_db("validator");
	$sql = "SELECT image FROM `tester` WHERE id = $id"; //query to insert vote into DB 
  	$image = mysql_query($sql,$con);
  	$row = mysql_fetch_assoc($image);
  	$displayImage = $row['image'];
  	
  	header("Content-type: image/jpeg");

	echo $displayImage;
?>

