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
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link  rel="stylesheet" href="http://fonts.googleapis.com/css?family=lobster">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
		<link href='http://fonts.googleapis.com/css?family=Rancho' rel='stylesheet' type='text/css'>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<script> 
			$(document).ready(function(){
    			$("#abc").click(function(){
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
	font-size:15px;
	color:#c90a0a;
}

a.remove:link{
	text-decoration: none;
}

a.remove:hover{
	font-size: 24px;
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

a.goback:link{
	text-decoration:none;
	color:white;
}
a.goback:visited{
	text-decoration:none;
	color:white;
}

a.backbutton:link{
	text-decoration:none;
	color: #444;
	font-size: 24px;
	
}

a.backbutton:visited{
	text-decoration:none;
	color: #444;
	font-size: 24px;
	
}

a.backbutton:hover{
	text-decoration:none;
	color: orange;
	font-size: 24px;
	
}


a.menuNotif:link{
	text-decoration: none;
}
a.menuNotif:visited{
	text-decoration: none;
}

.header p{
	color: white;
	background-color: rgba(68, 68, 68, 0.7);
	
}

p1{
	font-family: Rancho;
	font-size: 25px;
	
	margin-right:-40px;
}

p2{
	float: right;
}

#abc{
	font-size: 150%;
	float: right;
	padding-top: 11px;
	padding-right: 10px;
	
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
    -webkit-animation-name: fadeInUp;
}

</style>


	</head>
	<?php $id=$_GET['id']; ?>
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
			<div><p1>RatsValidator</p1>
				 <i class="fa fa-reply-all" id="abc"></i></div>
			</div>
			</div>
			<div id="panel">
				<form id="createPost" action="<?php echo "replySender.php?id=$id" ?>" method="post" enctype="multipart/form-data">
	          		<textarea type="text" name="name" id="name" maxlength="200" placeholder="What would you like to send?" rows="10%" 	cols="100%" form="createPost" required></textarea><br>
	         		
	          		<input id="submitButton" type="submit" value="Reply">
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
	$user = $_COOKIE['uratsvalidator'];
	$ident=$_GET['id']; 
	$user_ip = $_SERVER['REMOTE_ADDR'];
	$deviceInfo = $_SERVER['HTTP_USER_AGENT'];
 
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	$sql="select * from tester where $ident = id ORDER BY id DESC;";
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
	$username = $row['username'];
	$isUser = $row['voter_user'];

	$countreplies = "SELECT count(id) as 'count_replies' FROM `replies tester` WHERE id = $id";
	$result = mysql_query($countreplies) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
	    foreach($row as $cname => $cvalue){
	    	$repliescounted = $cvalue;
	    }
	}


	if($_COOKIE['uratsvalidator'] == $username){
		if($isImageAvailable==0){
			echo"<li>
			<table width = \"100%\">
				<tr>
					<td width =\"98%\"><a class=\"remove\" href=\"delete.php?id=$id\">
						<i class=\"fa fa-minus-circle\"></i>
					</a> $content</td>";
					

					if(contains($user, $isUser)){  
					echo"<td rowspan=\"2\"><center>
					<table>";
					if($vote_answer == "validated"){
					echo"<tr><td id=\"finalVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"notVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					else{
						echo"<tr><td id=\"notVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"finalVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					
					echo"</table></center>
					</td>";
					}
					else{
						echo"<td rowspan=\"2\"><center>
						<table>
						<tr><td id=\"VOTEUP\" style=\"text-align:center\"><a href=\"voteyes.php?id=$id\"><i class=\"fa fa-arrow-up\"></i></a></td></tr>
						<tr><td style=\"text-align:center\">$votes</td></tr>
						<tr><td id=\"VOTEDOWN\" style=\"text-align:center\"><a href=\"voteno.php?id=$id\"><i class=\"fa fa-arrow-down\"></i></a></td></tr>
						</table></center>
						</td>";
					}


				echo"</tr>
				<tr>
					<td id=\"timeFormat\">$timeFormat 
					";
					if($repliescounted == 0 || $repliescounted == NULL){
						echo ("<a class=\"reply\" href=\"replies.php?id=$id\">
							reply
							</a>");
						} 
						if($repliescounted > 0){
						echo ("<a class=\"replies\" href=\"replies.php?id=$id\">
							replies($repliescounted)
							</a>");
						} 
					echo"</td>
					
				</tr>
			</table>
			</li>";
		}
		else{
			echo"<li>
			<table width = \"100%\">
				<tr>
					<td width =\"98%\"><a class=\"remove\" href=\"delete.php?id=$id\">
						<i class=\"fa fa-minus-circle\"></i> 
					</a> <input type=\"checkbox\" id=\"check\" style=\"display:none;\">
			<a class=\"fancybox\" href=\"uploads/$image\" data-fancybox-group=\"gallery\" title=\"$content\"><i class=\"fa fa-camera\"></i></a> $content</td>";
					

					if(contains($user, $isUser)){  
					echo"<td rowspan=\"2\"><center>
					<table>";
					if($vote_answer == "validated"){
					echo"<tr><td id=\"finalVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"notVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					else{
						echo"<tr><td id=\"notVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"finalVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					
					echo"</table></center>
					</td>";
					}
					else{
						echo"<td rowspan=\"2\"><center>
						<table>
						<tr><td id=\"VOTEUP\" style=\"text-align:center\"><a href=\"voteyes.php?id=$id\"><i class=\"fa fa-arrow-up\"></i></a></td></tr>
						<tr><td style=\"text-align:center\">$votes</td></tr>
						<tr><td id=\"VOTEDOWN\" style=\"text-align:center\"><a href=\"voteno.php?id=$id\"><i class=\"fa fa-arrow-down\"></i></a></td></tr>
						</table></center>
						</td>";
					}


				echo"</tr>
				<tr>
					<td id=\"timeFormat\">$timeFormat 
					";
					if($repliescounted == 0 || $repliescounted == NULL){
						echo ("<a class=\"reply\" href=\"replies.php?id=$id\">
							reply
							</a>");
						} 
						if($repliescounted > 0){
						echo ("<a class=\"replies\" href=\"replies.php?id=$id\">
							replies($repliescounted)
							</a>");
						} 
					echo"</td>
					
				</tr>
			</table>
			</li>";
		}
	}
	else{
		if($isImageAvailable==0){
			echo"<li>
			<table width = \"100%\">
				<tr>
					<td width =\"98%\">$content</td>";
					

					if(contains($user, $isUser)){  
					echo"<td rowspan=\"2\"><center>
					<table>";
					if($vote_answer == "validated"){
					echo"<tr><td id=\"finalVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"notVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					else{
						echo"<tr><td id=\"notVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"finalVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					
					echo"</table></center>
					</td>";
					}
					else{
						echo"<td rowspan=\"2\"><center>
						<table>
						<tr><td id=\"VOTEUP\" style=\"text-align:center\"><a href=\"voteyes.php?id=$id\"><i class=\"fa fa-arrow-up\"></i></a></td></tr>
						<tr><td style=\"text-align:center\">$votes</td></tr>
						<tr><td id=\"VOTEDOWN\" style=\"text-align:center\"><a href=\"voteno.php?id=$id\"><i class=\"fa fa-arrow-down\"></i></a></td></tr>
						</table></center>
						</td>";
					}


				echo"</tr>
				<tr>
					<td id=\"timeFormat\">$timeFormat";
					if($repliescounted == 0 || $repliescounted == NULL){
						echo ("<a class=\"reply\" href=\"replies.php?id=$id\">
							reply
							</a>");
						} 
						if($repliescounted > 0){
						echo ("<a class=\"replies\" href=\"replies.php?id=$id\">
							replies($repliescounted)
							</a>");
						} 
					echo"</td>
					
				</tr>
			</table>
			</li>";
		}
		else{
			echo"<li>
			<table width = \"100%\">
				<tr>
					<td width =\"98%\"><input type=\"checkbox\" id=\"check\" style=\"display:none;\">
			<a class=\"fancybox\" href=\"uploads/$image\" data-fancybox-group=\"gallery\" title=\"$content\"><i class=\"fa fa-camera\"></i></a> $content</td>";
					

					if(contains($user, $isUser)){  
					echo"<td rowspan=\"2\"><center>
					<table>";
					if($vote_answer == "validated"){
					echo"<tr><td id=\"finalVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"notVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					else{
						echo"<tr><td id=\"notVOTEUP\" style=\"text-align:center\"><i class=\"fa fa-arrow-up\"></i></td></tr>
					<tr><td style=\"text-align:center\">$votes</td></tr>
					<tr><td id=\"finalVOTEDOWN\" style=\"text-align:center\"><i class=\"fa fa-arrow-down\"></i></td></tr> ";
					}
					
					echo"</table></center>
					</td>";
					}
					else{
						echo"<td rowspan=\"2\"><center>
						<table>
						<tr><td id=\"VOTEUP\" style=\"text-align:center\"><a href=\"voteyes.php?id=$id\"><i class=\"fa fa-arrow-up\"></i></a></td></tr>
						<tr><td style=\"text-align:center\">$votes</td></tr>
						<tr><td id=\"VOTEDOWN\" style=\"text-align:center\"><a href=\"voteno.php?id=$id\"><i class=\"fa fa-arrow-down\"></i></a></td></tr>
						</table></center>
						</td>";
					}


				echo"</tr>
				<tr>
					<td id=\"timeFormat\">$timeFormat";
					if($repliescounted == 0 || $repliescounted == NULL){
						echo ("<a class=\"reply\" href=\"replies.php?id=$id\">
							reply
							</a>");
						} 
						if($repliescounted > 0){
						echo ("<a class=\"replies\" href=\"replies.php?id=$id\">
							replies($repliescounted)
							</a>");
						} 
					echo"</td>
					
				</tr>
			</table>
			</li>";
		}
	}
}
?>
</ul>

<?php
$countreplies = "SELECT count(id) as 'count_replies' FROM `replies tester` WHERE id = $id";
	$result = mysql_query($countreplies) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
	    foreach($row as $cname => $cvalue){
	    	$repliescounted = $cvalue;
	    }
	}

echo "<ul id=\"repliesul\"><li id=\"repliesli\"><h6><a class = \"backbutton\" href=\"index.php\"><i class=\"fa fa-chevron-circle-left\"> </i></a> REPLIES ($repliescounted) </h6></li></ul>";

?>


			<?php
				$user_ip = $_SERVER['REMOTE_ADDR'];
				$deviceInfo = $_SERVER['HTTP_USER_AGENT'];

				$con=mysql_connect("localhost", "username", "password");
				mysql_select_db("validator");
				$sql="SELECT * FROM `replies tester` WHERE id = $id ORDER BY comment_id";
				/*$checkifowner = "select device_info from tester where id = $id";
				$eq2=mysql_query($checkifowner,$con);
				while($row2=mysql_fetch_array($eq2)){
					$device_info = $row2['device_info'];
				}
				$deviceINFO = $device_info;*/
				$eq=mysql_query($sql,$con);
			?>
	<ul>

<?php
while($row=mysql_fetch_array($eq)){
	$response=$row['response'];
	$time=$row['time'];
	$timeFormat = nicetime($time);
	$id = $row['id'];
	$device_info = $row['device_info'];
	$comment_id = $row['comment_id'];
	$username = $row['username'];
	
	if($_COOKIE['uratsvalidator'] == $username){
		echo("<li>
			<table style=\"width:100%;\">
			<tr>
			<td id = $id style=\"width:100%;\">
			$response 
			</td>
			</tr>
			<tr>
			<td id=\"timeFormat\">$timeFormat
			<a class=\"remove\" href=\"deletecomment.php?id=$comment_id\">
				remove
			</a>
			</td></tr></table> ");
	}
	else{
		echo("<li>
			<table style=\"width:100%;\">
			<tr>
			<td id = $id style=\"width:100%;\">
			$response 
			</td>
			</tr>
			<tr>
			<td id=\"timeFormat\">$timeFormat
			</td></tr></table> ");
	}
	//else{ echo "There was an error processing your request.";}
	}
	?>
</ul>
		
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