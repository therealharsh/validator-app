<!-- author: Harsh Keswani, @therealharsh -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<?php
$con=mysql_connect("localhost","username", "password");
mysql_select_db("validator");
$sql = "select username from login_tester";
$eq = mysql_query($sql, $con);
$counter = 0;
while($row=mysql_fetch_array($eq)){
$username = $row['username'];
	if($_COOKIE['uratsvalidator'] == $username){
		$counter +=1;
	}
}
if($counter != 1){
echo "<meta http-equiv='refresh' content='0;url=http://www.ratsvalidator.com/validator-app/home.php'>";
}

if(!isset($_COOKIE['uratsvalidator'])){
echo "<meta http-equiv='refresh' content='0;url=http://www.ratsvalidator.com/validator-app/home.php'>";
}
?>
	<head>
		<meta http-equiv="refresh" content="300" >
		<meta charset="utf-8" />
		<meta name="author" content="therealharsh" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
		
<?php
	$deviceInfoAgain = $_SERVER['HTTP_USER_AGENT'];
 	$user = $_COOKIE['uratsvalidator'];
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	
	$countreadOther = "SELECT count(*) FROM `comment_tester` WHERE username = '$user' AND user_isread = 0 AND username != notif_poster";
	$result2 = mysql_query($countreadOther) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)){
	    foreach($row as $cname2 => $cvalue2){
	    	$counter2 = $cvalue2;
	    }
	}
	
	$countread = "SELECT count(B.`isread`) as 'counter' FROM `replies tester` B WHERE `isread` = 0 AND B.id in (select A.id from tester A where '$user' = username) AND username != '$user'";
	if($user != NULL){
		$result = mysql_query($countread) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		    foreach($row as $cname => $cvalue){
		    	$counter = $cvalue + $counter2;
		    }
		}
	}
	else{
		$counter = 0;
	}
	
?>
		<?php
			if($counter >0){
			echo"<title>($counter) Chat - RatsValidator</title>";
			}
			else{
			echo"<title>Chat - RatsValidator</title>";
			}
		?>

		<link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<link type="text/css" rel="stylesheet" href="css/demo.css" />
		<link type="text/css" rel="stylesheet" href="dist/css/jquery.mmenu.all.css" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link  rel="stylesheet" href="http://fonts.googleapis.com/css?family=lobster">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
		<link href='http://fonts.googleapis.com/css?family=Rancho' rel='stylesheet' type='text/css'>
		
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

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
		
		
		
		
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
	background: orange;
}

#cont {
	position: relative;
	width: 100%;
	background: white;
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

a.replies:link{
	text-decoration: none;
	font-size: 12px;
	color: #034694;
}

a.replies:visited{
	text-decoration: none;
	font-size: 12px;
	color: #034694;
}

a.replies:hover{
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
	font-size: 16px;
}

#VOTEUP a:link {
    text-decoration: none;
}

#VOTEUP a:hover {
    color: #49c95e
}

#notVOTEUP{
	color:green;
	font-size: 16px;
	opacity: 0.1
}

#notVOTEDOWN{
	color:#c90a0a;
	font-size: 16px;
	opacity: 0.1
}

#finalVOTEUP{
	color:green;
	font-size: 16px;
}

#finalVOTEDOWN{
	color:#c90a0a;
	font-size: 16px;
}


#VOTEDOWN a{
	color:#c90a0a;
	font-size: 16px;
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



#pass{
  line-height:100%;
  width:100%;
  font-size: 100%;
  padding-top:1%;
	padding-bottom:1%;
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

.header p{
	color: white;
	background-color: rgba(68, 68, 68, 0.7);
	
}

a.menuNotif:link{
	text-decoration: none;
}
a.menuNotif:visited{
	text-decoration: none;
}

#tp{
	font-size: 100%;
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

#name{
  line-height:100%;
  width:100%;
  font-size: 100%;
  padding-top: 2%;
  padding-bottom: 2%;
}

footer{
	width: 100%;
	background-color: #444;
	bottom: 0;
}

#sent{
text-align: right;
}

#received{
text-align: left;
}

p2{
color: blue;
}

p3{
color: orange;
}

html{
  /** Basic styles for an animated element */
    -webkit-animation-duration: 0.5s;
    transition-timing-function: ease-in;
    -webkit-animation-fill-mode: both;
    -webkit-animation-name: fadeIn;
}

</style>


	</head>
	<?php if(!isset($_COOKIE['uratsvalidator'])){exit;} ?>
		<div id="page">
			<div class="header">
			<?php
			if($counter == 0){
				echo"<a href=\"#menu\"></a>";
			}
			else{
				echo"<a class=\"menuNotif\" href=\"#menu\"><p>$counter</p></a>";
			}
			?>
				RatsValidator
			</div>
			<div id="flip"><p>Private chat</p></div>
			<div id="panel">
				
			</div>
			<div class="content">	
			</div>
			<div id="cont">
			<div id="tp">
			
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
				
				
	<ul>
	<?php 
		$threadID=$_GET['thread_id']; 
		$owner = $_COOKIE['uratsvalidator'];
	 	
	 	
	 	
		$con2=mysql_connect("localhost","username", "password");
		mysql_select_db("validator");
		
		
		$checkforreceiver = "SELECT user2 from thread_tester where thread_id = '$threadID'";
		$eq3=mysql_query($checkforreceiver, $con);
		while($row=mysql_fetch_array($eq3)){
			$user2 = $row['user2'];
			if($user2 == $owner){
				$query = "UPDATE thread_tester SET invite_nullity = 1 where thread_id = '$threadID'";
				mysql_query($query, $con);
			}
		}
		
		$messages="select * from message_tester where thread_id = '$threadID' ORDER by date";
		$eq2=mysql_query($messages,$con2);
		while($row=mysql_fetch_array($eq2)){
		
			$threadcombo = $row['threadcombo'];
			$usernameFrom = $row['username_from'];
			$usernameTo = $row['username_to'];
			$chatnameFrom = $row['chatname_from'];
			$chatnameTo = $row['chatname_to'];
			$message = $row['message'];
			
			
			
			if($owner == $usernameFrom){
			echo"<li id=\"sent\">
			<p3>$chatnameFrom</p3>: $message
			</li>";
			}
			else if($owner == $usernameTo){
			echo"<li id=\"received\">
			<p2>$chatnameFrom</p2>: $message
			</li>";
			}
		}
	?>
	</ul>			

	</div>
</div>

		<footer>
			<?php echo"<form id=\"createPost\" action=\"replychat.php?thread_id=$threadID\" method=\"post\" enctype=\"multipart/form-data\">"; ?>
	          		<input type="text" id="name" name="message" placeholder="ratsChat"><br>
	          		<input id="submitButton" type="submit" value="Send">
    			</form>	
		</footer>		
			
	
<?php
	$deviceInfoAgain = $_SERVER['HTTP_USER_AGENT'];
 	$user = $_COOKIE['uratsvalidator'];
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	$countread = "SELECT count(B.`isread`) as 'counter' FROM `replies tester` B WHERE `isread` = 0 AND B.id in (select A.id from tester A where '$user' = username)";
	if($user != NULL){
		$result = mysql_query($countread) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		    foreach($row as $cname => $cvalue){
		    	$counter = $cvalue;
		    }
		}
	}
	else{
		$counter = 0;
	}
	
?>

			</div>
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