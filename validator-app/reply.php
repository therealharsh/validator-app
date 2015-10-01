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
			echo"<title>($counter) RatsValidator</title>";
			}
			else{
			echo"<title>RatsValidator</title>";
			}
		?>

		<link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<link type="text/css" rel="stylesheet" href="css/demo.css" />
		<link type="text/css" rel="stylesheet" href="dist/css/jquery.mmenu.all.css" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script> 
			$(document).ready(function(){
    			$("#flip").click(function(){
        		$("#panel").slideToggle("slow");
    		});
		});
		</script>

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
	background-color: #034694;
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


.header p{
	margin-left: 100%;
	color: red;
	
}

a.menuNotif:link{
	text-decoration: none;
}
a.menuNotif:visited{
	text-decoration: none;
}

a.backbutton:link{
	padding: 1%;
	text-decoration:none;
	color:white;
	border: solid 1px #444;
	background-color: #444;
	text-align: center;
	vertical-align: center;
}

a.backbutton:visited{
	padding: 1%;
	text-decoration:none;
	color:white;
	border: solid 1px #444;
	background-color: #444;
	text-align: center;
	vertical-align: center;
}

a.backbutton:hover{
	padding: 1%;
	text-decoration:none;
	color:#444;
	border: solid 1px white;
	background-color: white;
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
			<div id="flip"><p>Click here to Reply</p></div>
			<div id="panel">
				<form id="createPost" action="<?php echo "replySender.php?id=$id" ?>" method="post" enctype="multipart/form-data">
	          		<textarea type="text" name="name" id="name" maxlength="200" placeholder="What would you like to send?" rows="10%" 	cols="100%" form="createPost" required></textarea><br>
	         		
	          		<input id="submitButton" type="submit" value="SEND">
    			</form>
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

				<?php
				function contains($needle, $haystack)
				{
				    return strpos($haystack, $needle) !== false;
				}
				?>

			<?php
				$user_ip = $_SERVER['REMOTE_ADDR'];
				$deviceInfo = $_SERVER['HTTP_USER_AGENT'];
			 
				$con=mysql_connect("localhost", "username", "password");
				mysql_select_db("validator");
				$sql="select * from tester where id = $id";
				$eq=mysql_query($sql,$con);
			?>
	<ul>

<?php
while($row=mysql_fetch_array($eq)){
	$content=$row['content'];
	$time=$row['time'];
	$timeFormat = nicetime($time);
	$id = $row['id'];
	$YES = $row['numYes'];
	$NO = $row['numNo'];
	$votes = $YES - $NO;
	$posterIP = $row['ip_address'];
	$voterIP = $row['voter_ip'];
	$image = $row['image_name'];
	$image_data = $row['image'];
	$vote_answer = $row['final_vote'];
	$device_info = $row['device_info'];
	$isImageAvailable = $row['image_nullity'];
	//if($device_info != $deviceInfo){
	if($isImageAvailable==0){
		echo("<li>
			<table style=\"width:100%;\">
			<tr>
			<td id = $id style=\"width:100%;\">
			$content 
			</td>
			<td id=\"votes\" style=\"width:10%;\" \"colspan=\"2\">$votes
			</td>
			</tr>
			<tr>
			<td id=\"timeFormat\">$timeFormat
			</td> ");
			if(contains($user_ip, $voterIP)){ //checks if voter has already voted
				echo("<td id=\"doneVoting\"><span>$vote_answer</span></td> ");
			}
			else{
				echo("<td id=\"VOTEUP\"><a onclick=\"saveScroll()\" href=\"voteyes.php?id=$id\">UP</a></td> ");
				echo("<td id=\"VOTEDOWN\"><a onclick=\"saveScroll()\" href=\"voteNo.php?id=$id\">DOWN</a></td> ");
			}
			echo ("</tr></table>");
			echo ("<a href=\"index.php\"> GO BACK </a>");
		}
		else{
			echo("<li>
			<table style=\"width:100%;\">
			<tr>
			<td id = $id style=\"width:100%;\">
			$content <a class=\"fancybox\" href=\"uploads/$image\" data-fancybox-group=\"gallery\" title=\"$content\">(click to view image)</a>
			</td>
			<td id=\"votes\" style=\"width:10%;\" \"colspan=\"2\">$votes
			</td>
			</tr>
			<tr>
			<td id=\"timeFormat\">$timeFormat
			</td> ");
			if(contains($user_ip, $voterIP)){ //checks if voter has already voted
				echo("<td id=\"doneVoting\"><span>$vote_answer</span></td> ");
			}
			else{
				echo("<td id=\"VOTEUP\"><a onclick=\"saveScroll()\" href=\"voteyes.php?id=$id\">UP</a></td> ");
				echo("<td id=\"VOTEDOWN\"><a onclick=\"saveScroll()\" href=\"voteNo.php?id=$id\">DOWN</a></td> ");
			}
			echo ("</tr></table>");
		}
	//}
		//else{
			//echo ("Error 404. Bad URL <br> <a href=\"index.php\"> CLICK HERE TO GO BACK </a>");
		//}
	}
?>
</ul>
	<a class = "backbutton" href="index.php"> GO BACK </a>	
	</div>
</div>	
<?php
	$deviceInfoAgain = $_SERVER['HTTP_USER_AGENT'];
 
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	$countread = "SELECT count(B.`isread`) as 'counter' FROM `replies tester` B WHERE `isread` = 0 AND B.id in (select A.id from tester A where '$deviceInfoAgain' = device_info)";
	$result = mysql_query($countread) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
	    foreach($row as $cname => $cvalue){
	    	$counter = $cvalue;
	    }
	}
?>
			</div>
			<nav id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="myposts.php">My Posts</a></li>
					<?php
					if($counter==0){
						echo("<li><a href=\"notifications.php\">Notifications</a></li>");
					}
					else{
						echo("<li><a href=\"notifications.php\">Notifications ($counter)</a></li>");
					}
					?>
					<li><a href="#about">About us</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</div>
	
</html>