<!-- author: Harsh Keswani, @therealharsh -->

<?php
		setcookie("ratshasaccount" , 'wehavearat' , time()+(365 * 24 * 60 * 60), '/');
		setcookie("uratsvalidator" , '' , time()-50000, '/');
		header("Location: home.php");
		exit;
?>