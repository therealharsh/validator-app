<!-- author: Harsh Keswani, @therealharsh -->

<?php
	$username=$_POST['name']; //get username
	$password=$_POST['pass']; //get password

  	$salt = 'insertsalthere'; //salt for password

  	$hash = md5($salt . $password); //encrypt password using md5

	$con=mysql_connect("localhost","username", "password") or die(mysql_error());
	mysql_select_db("validator");

	$sql = "select * from login_tester where username = '$username'"; //sql query look up username	
  	$eq=mysql_query($sql,$con);
	while($row=mysql_fetch_array($eq))
	{
		$usernamedb=$row['username'];
		$passworddb=$row['password'];
		if($hash==$passworddb&&$username==$usernamedb){
			$cookie_name = "uratsvalidator";
			$cookie_value = $username;
			$cookie_pass = $hash;
			setcookie($cookie_name, $cookie_value, time()+(365 * 24 * 60 * 60), "/");
			setcookie('ratsvalidator2', $cookie_pass, time()+(365 * 24 * 60 * 60), "/");
			header("Location: index.php");
		}

		else{
			//echo "$passworddb <br> $hash";
			header("Location: home.php");
		}
	}
	//header("Location: home.php")
?>

<!-- END PHP -->