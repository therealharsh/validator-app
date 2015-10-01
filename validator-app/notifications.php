<!-- author: Harsh Keswani, @therealharsh -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	if(!isset($_COOKIE['uratsvalidator'])){
		header("Location: home.php");
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="therealharsh" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>Notifications - RatsValidator</title>

		<link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<link type="text/css" rel="stylesheet" href="css/demo.css" />
		<link type="text/css" rel="stylesheet" href="dist/css/jquery.mmenu.all.css" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="dist/js/jquery.mmenu.min.all.js"></script>
		
		<script type="text/javascript">
			$(function() {
				$('nav#menu').mmenu();
			});
		</script>
		
			<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

		
		
		
		
		<style type="text/css">
		* {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body,ul,li {
	padding: 0;
	margin: 0;
	border: 0;
}
body{
	font-size: 12px;
	font-family: ubuntu, helvetica, arial;
}

#cont {
	position: relative;
	width: 100%;
	background: #ccc;
	overflow: hidden;
}

#tp {
	position: relative;
	width: 100%;
}

#tp ul {
	width: 100%;
	text-align: left;
	list-style: none;
	padding: 0;
	margin: 0;
	width: 100%;
	text-align: left;
}

#tp li {
	padding: 10px;
	line-height: 25px;
	border-bottom: 1px solid #ccc;
	border-top: 1px solid #fff;
	background-color: #fafafa;
	font-size: 14px;
}

#timeFormat{
	font-size: 12px;
	color:#929292;
}

a.unseen:link{
	font-size: 12px;
	color:#c90a0a;
	text-decoration: none;
	font-style: bold;
}
a.unseen:visited{
	font-size: 12px;
	color:#c90a0a;
	text-decoration: none;
	font-style: bold;
}

a.remove{
	font-size: 12px;
	color:#c90a0a;
}

a.remove:link{
	text-decoration: none;
}

a.remove:hover{
	font-size: 12px;
	color:#ff0000;
}

a.reply:link{
	text-decoration: none;
	font-size: 12px;
	color:#adadad;
}

a.reply:hover{
	text-decoration: none;
	font-size: 12px;
	color:#444;
}


#votes{
	color:#222;
	text-align: right;
}

#VOTEUP a{
	color:green;
	font-size: 12px;
}

#VOTEUP a:link {
    text-decoration: none;
}

#VOTEUP a:hover {
    color: #49c95e
}

#VOTEDOWN a{
	color:#c90a0a;
	font-size: 12px;
}

#VOTEDOWN a:link {
    text-decoration: none;
}

#VOTEDOWN a:hover {
    color: #ff0000;
}

#doneVoting{
	font-size:12px;
	color:#929292;
}

#refresh a{
	font-size: 70%;
	color: white;
    text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;
}

#$id a{
	font-size: 12px;
	color:#929292;
}

#panel, #flip {
    text-align: center;
    border-top: solid 1px #c3c3c3;
    border-bottom: solid 1px #c3c3c3;
}

#flip {
	background-color: orange;
}

#flip p{
	color: white;
	text-transform: uppercase;
}

#panel {
    display: none;
}

#name{
  line-height:100%;
  width:100%;
  font-size: 100%;
}

#submitButton{
  width:100%;
  background-color:#444;;
  line-height: 100%;
  font-size:100%;
  color:white;
}

.fancybox-custom .fancybox-skin {
	box-shadow: 0 0 50px #222;
}

.fancybox{
	font-size: 12px;
}

a.relpost:link{
	text-decoration: none;
	font-size: 12px;
	color:#929292;
}

a.relpost:visited{
	text-decoration: none;
	font-size: 12px;
	color:#929292;
}

a.trashNotif:link{
	text-decoration: none;
	font-size: 15px;
	color: #c90a0a;;
}

a.trashNotif:visited{
	text-decoration: none;
	font-size: 15px;
	color: #c90a0a;;
}

a.trashNotif:hover{
	text-decoration: none;
	font-size: 20px;
	color: red;
}

p1{
	font-size: 12px;
}

p2{
	font-size: 120%;
}

@-webkit-keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
  }
}

@-webkit-keyframes fadeInRight {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
  }
}

html{
  /** Basic styles for an animated element */
    -webkit-animation-duration: 0.5s;
    transition-timing-function: ease-in;
    -webkit-animation-fill-mode: both;
    -webkit-animation-name: fadeIn;
}

#repliesyou ul{
text-align:center;
background-color: #444;
color:white;
}
#repliesyou li{
text-align:center;
background-color: #444;
color:white;
}

#repliesother ul{
text-align:center;
background-color: #444;
color:white;
}
#repliesother li{
text-align:center;
background-color: #444;
color:white;
}


</style>



	</head>
		<div id="page">
			<div class="header">
				<a href="#menu"></a>
				RatsValidator
			</div>
			<div id="flip"><p>NOTIFICATIONS</p></div>
			<div id="panel">
			</div>
			<div class="content">	
			</div>
			<div id="cont">
			<div id="tp">
			<div id = "repliesyou"><ul><li>REPLIES TO YOUR POSTS <a href ="clearAllPosts.php"><i class="fa fa-times-circle"></i></a></li></ul></div>
			<?php
				function nicetime($date)
				{
				    if(empty($date)) {
				        return "No date provided";
				    }
				    
				    $periods         = array("s", "m", "h", "d", "w", "m", "y", "dec");
				    $lengths         = array("60","60","24","7","4.35","12","10");
				    
				    $now             = time()-(60*60*7); //messed up time thingy
				    $unix_date         = strtotime($date);
				    
				       // check validity of date
				    if(empty($unix_date)) {    
				        return "Bad date";
				    }

				    // is it future date or past date
				    if($now > $unix_date) {    
				        $difference     = $now - $unix_date;
				        $tense         = "ago";
				        
				    } else {
				        $difference     = $unix_date - $now;
				        $tense         = "from now";
				    }
				    
				    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
				        $difference /= $lengths[$j];
				    }
				    
				    $difference = round($difference);
				    
				    
				    return "$difference$periods[$j]";
				}

				$date = "2009-03-04 17:45";
				$result = nicetime($date); // 2 days ago

				?>

				<?php
				function contains($needle, $haystack)
				{
				    return strpos($haystack, $needle) !== false;
				}
				?>

			<?php
				$user_ip = $_SERVER['REMOTE_ADDR'];
				$deviceInfoAgain = $_SERVER['HTTP_USER_AGENT'];
				$username = $_COOKIE['uratsvalidator'];
				$con=mysql_connect("localhost", "username", "password");
				mysql_select_db("validator");
				$sql="SELECT * from `replies tester` A where A.id in (select B.id from tester B where '$username' = username) AND isread != 2 ORDER BY comment_id DESC";
				$eq=mysql_query($sql,$con);
			?>
	<ul>

<?php
while($row=mysql_fetch_array($eq)){
	$response=$row['response'];
	$time=$row['time'];
	$timeFormat = nicetime($time);
	$id = $row['id'];
	$readornot = $row['isread'];
	$userCheck = $row['username'];
	$commentid = $row['comment_id'];

	if($readornot == 0 && $userCheck != $username){
		echo("<li>
			<table style=\"width:100%;\">
			<tr>
			<td id = $id style=\"width:100%;\">
			<p1>Someone replied to your post with:</p1>  
			<p2>\"$response\"</p2><br><a class=\"relpost\" href=\"relatedpost.php?id=$id\">see response in context</a>
			</td>
			</td>
			</tr>
			<tr>
			<td id=\"timeFormat\">$timeFormat <a class = \"unseen\">*NEW*</a> <a class=\"trashNotif\" href=\"deleteNotif.php?id=$commentid\"><i class=\"fa fa-trash-o\"> </i></a>
		</td></tr></table> ");
		
		
		
	}
	else if($readornot > 0 && $userCheck != $username){
		echo("<li>
			<table style=\"width:100%;\">
			<tr>
			<td id = $id style=\"width:100%;\"> 
			<p1>Someone replied to your post with:</p1>   
			<p2>\"$response\"</p2><br><a class=\"relpost\" href=\"relatedpost.php?id=$id\">see response in context</a>
			</td>
			</td>
			</tr>
			<tr>
			<td id=\"timeFormat\">$timeFormat <a class=\"trashNotif\" href=\"deleteNotif.php?id=$commentid\"><i class=\"fa fa-trash-o\"> </i></a>
		</td></tr></table> ");
	}
	}
	?>
</ul>
<div id = "repliesother"><ul><li>REPLIES TO COMMENTS <a href ="clearAllComment.php"><i class="fa fa-times-circle"></i></a></li></ul></div>
		<?php
				$user_ip = $_SERVER['REMOTE_ADDR'];
				$deviceInfoAgain = $_SERVER['HTTP_USER_AGENT'];
				$username = $_COOKIE['uratsvalidator'];
				$con=mysql_connect("localhost", "username", "password");
				mysql_select_db("validator");
				$sql="SELECT * from `replies tester` where id in (SELECT id from `replies tester` where username ='$username') AND post_id in (SELECT post_id from `comment_tester` where username = '$username' AND user_isread !=2) ORDER BY comment_id DESC";
				$eq=mysql_query($sql,$con);
				while($rows=mysql_fetch_array($eq)){
					$user = $rows['username'];
					$response = $rows['response'];
					$time=$rows['time'];
					$timeFormat = nicetime($time);
					$id = $rows['id'];
					$comment_id = $rows['comment_id'];
					if($user != $username){
						echo"<ul><li>
						<table style=\"width:100%;\">
						<tr>
						<td id = $id style=\"width:100%;\">
						<p1>Someone also replied to a post you commented on:</p1>  
						<p2>\"$response\"</p2><br><a class=\"relpost\" href=\"relatedpost.php?id=$id\">see response in context</a>
						</td>
						</td>
						</tr>
						<tr>
						<td id=\"timeFormat\">$timeFormat
						</td></tr></table></li></ul>";
					}
				}
				
			?>
		
	</div>
</div>	
<?php
	$deviceInfoAgain = $_SERVER['HTTP_USER_AGENT'];
 	$user = $_COOKIE['uratsvalidator'];
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	$countread = "SELECT count(B.`isread`) as 'counter' FROM `replies tester` B WHERE `isread` = 0 AND B.id in (select A.id from tester A where '$user' = username)";
	$result = mysql_query($countread) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
	    foreach($row as $cname => $cvalue){
	    	$counter = $cvalue;
	    }
	}
?>
			</div>
<?php
	$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
	$username = $_COOKIE['uratsvalidator'];
	$con=mysql_connect("localhost","username", "password") or die(mysql_error());
	mysql_select_db("validator");
	$updateInfo = "UPDATE `replies tester` A SET `isread` = 1 where A.id in (select B.id from tester B where '$username' = username) AND isread != 2"; //query to insert post into DB
	$updateInfo2 = "UPDATE `comment_tester` A SET `user_isread` = 1 where username = '$username' AND user_isread !=2";
  	$sql = "select username from tester where '$username' = username";
  	$eq = mysql_query($sql, $con);
  	while($row=mysql_fetch_array($eq)){
  		$user=$row['username'];
  		if($user == $username && $username != NULL){
  			mysql_query($updateInfo, $con);
  		}
  	}
  	mysql_query($updateInfo2, $con);
 
?>
			<nav id="menu">
			<ul>
					<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="myposts.php"><i class="fa fa-user-secret"></i> My Posts</a></li>
					<?php
					if($counter==0){
						echo("<li><a href=\"notifications.php\"><i class=\"fa fa-comment\"></i> Notifications</a></li>");
					}
					else{
						echo("<li><a href=\"notifications.php\"><i class=\"fa fa-comment\"></i> Notifications ($counter)</a></li>");
					}
					?>
					<li><a href="accountinfo.php"><i class="fa fa-user"></i> Account Info</a></li>
					<li><a href="#about"><i class="fa fa-info-circle"></i> About us</a></li>
					<li><a href="#contact"><i class="fa fa-envelope-o"></i> Contact</a></li>
					<li><a href="logoutscript.php"><i class="fa fa-arrow-left"></i> Log out</a></li>
				</ul>
			</nav>
		</div>
	
</html>