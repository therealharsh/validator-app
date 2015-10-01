<!-- author: Harsh Keswani, @therealharsh -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
if(isset($_COOKIE['uratsvalidator']) && $counter == 1){
echo "<meta http-equiv='refresh' content='0;url=http://www.ratsvalidator.com/validator-app/index.php'>";
}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="therealharsh" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>RatsValidator</title>

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
	
	<script>
		document.onreadystatechange = function () {
		  var state = document.readyState
		  if (state == 'interactive') {
		       document.getElementById('page').style.visibility="hidden";
		  } else if (state == 'complete') {
		      setTimeout(function(){
		         document.getElementById('interactive');
		         document.getElementById('load').style.visibility="hidden";
		         document.getElementById('page').style.visibility="visible";
		      },1000);
		  }
		}
		</script>		
		
		
		
		<style type="text/css">
		* {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("img/loading.gif") no-repeat center center rgba(255,153,0,0.25)
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

a.replies:link{
	text-decoration: none;
	font-size: 12px;
	color:orange;
}

a.replies:visited{
	text-decoration: none;
	font-size: 12px;
	color:orange;
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
	padding-top:1%;
	padding-bottom:1%;
}
#pass{
  line-height:100%;
  width:100%;
  font-size: 100%;
  padding-top:1%;
	padding-bottom:1%;
}

#passagain{
  line-height:100%;
  width:100%;
  font-size: 100%;
  padding-top:1%;
	padding-bottom:1%;
}

#name1{
  line-height:100%;
  width:100%;
  font-size: 100%;
  padding-top:1%;
  padding-bottom:1%;
}
#pass1{
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

p1{
	font-family: Rancho;
	font-size: 25px;
	
}

footer{
	width: 100%;
	height: 10%;
	background-color: #444;
	padding-left: 2%;
	padding-right: 2%;
	position:fixed;
  	bottom:0;
	
}

footer p{
	font-family: 'ubuntu';
	font-size: 90%;
	text-align: center;
	color: white;
}

footer a:link{
	text-decoration: none;
	color: orange;
}

footer span{
	color: orange;
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
</style>





	</head>
		<div id="load"></div>
		<div id="page">
			<div class="header">
				<a href="#menu"></a>
				<p1>RatsValidator</p1>
			</div>
			<div id="flip"><p>Don't have an account? click here to sign up!</p></div>
			<div id="panel">
    			<form id="createPost" action="signupscript.php" method="post" enctype="multipart/form-data">
	          		<input type="text" id="name" name="name" placeholder="Username"><br>
	          		<input type="password" id="pass" name="pass" placeholder="Password">
	          		<input type="password" id="passagain" name="passagain" placeholder="Password again">
	          		<input id="submitButton" type="submit" value="Sign Up">
    			</form>	
			</div>
			<div class="content">
			<h6><center>LOGIN</center></h6>
				<form id="createPost" action="loginscript.php" method="post" enctype="multipart/form-data">
	          		<input type="text" id="name" name="name" placeholder="Username"><br>
	          		<input type="password" id="pass" name="pass" placeholder="Password">
	          		<input id="submitButton" type="submit" value="Log In">
	          		<br><br>
	          		
    			</form>
			</div>
			<div id="cont">
			<div id="tp">

					</div>
				</div>	
			</div>
			<nav id="menu">
				<ul>
					<li><a href="index.php"><i class="fa fa-sign-in"></i> Login</a></li>
					<li><a href="index.php"><i class="fa fa-question-circle"></i> How To Use</a></li>
					<li><a href="#about"><i class="fa fa-info-circle"></i> About us</a></li>
					<li><a href="#contact"><i class="fa fa-envelope-o"></i> Contact</a></li>
				</ul>
			</nav>
		</div>
		
	<footer>
		<p>
			RatsValidator v1.6 2015. Created by Harsh Keswani - Inspired by Rahat Sanghvi.
			Design by <span href = "ratsvalidator.com">therealharsh</span>
		</p>
	</footer>
	
</html>