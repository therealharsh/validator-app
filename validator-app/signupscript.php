<!-- author: Harsh Keswani, @therealharsh -->

<?php
	if(isset($_COOKIE['ratshasaccount'])){
		echo "Houston, we have a rat!";
	}
	
	$user_ip = $_SERVER['REMOTE_ADDR'];
	$deviceInfo = $_SERVER['HTTP_USER_AGENT'];
	$username=strtolower($_POST['name']); //get username
	$password=$_POST['pass']; //get password
	$passwordagain=$_POST['passagain']; //get password again
	//echo"$passwordagain";
  	$salt = 'C#EL$E@'; //salt for password

  	$hash = md5($salt . $password); //encrypt password using md5
  	$hashagain = md5($salt . $passwordagain);
  	
	
	$con=mysql_connect("localhost","username", "password") or die(mysql_error());

	mysql_select_db("validator");
	$checker = "select username from login_tester";
	
	$sql = "INSERT INTO login_tester(username, password, device_info, ipaddress, join_date) VALUES ('$username', '$hash', '$deviceInfo', '$user_ip', NOW())"; 
	
	$eq = mysql_query($checker, $con); 
	$keeptrack = 0;
	while($row=mysql_fetch_array($eq)){	
	$usernamedb = $row['username'];	
	if($usernamedb == $username){
		$keeptrack +=1;
	}
	}
	if($keeptrack == 0 && $hash == $hashagain && $password != NULL && username != NULL){
		if(!isset($_COOKIE['ratshasaccount'])){
			mysql_query($sql,$con);
		}
		$cookie_name = "uratsvalidator";
		$cookie_value = $username;
		$cookie_pass = $hash;
		setcookie($cookie_name, $cookie_value, time()+(365 * 24 * 60 * 60), "/");
		setcookie('ratsvalidator2', $cookie_pass, time()+(365 * 24 * 60 * 60), "/");
		header("Location: index.php");
	}
	else{
		echo"either the name is in use or passwords dont match or something went wrong";
	}

	//header("Location: home.php")
?>