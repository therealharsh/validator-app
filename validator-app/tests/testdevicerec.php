<?php
$con=mysql_connect("localhost","userperson", "cBme(*$2sfXk");
	mysql_select_db("validator");
	$sql="select * from tester where id = 274;";
	$eq=mysql_query($sql,$con);
	
	while($row=mysql_fetch_array($eq)){
	$id = $row['id'];
	$dinfo=$row['device_info'];
		echo("$dinfo <br>");
}
?>