<!-- author: Harsh Keswani, @therealharsh -->

<!-- THIS IS NOT IMOPORTANT IGNORE THISSSSS -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

<title>RatsValidator</title>

<script type="text/javascript" src="build/iscroll.js"></script>


<script type="text/javascript">
var myScroll;

function loaded () {
	myScroll = new IScroll('#wrapper', { bounceEasing: 'elastic', bounceTime: 1200 });
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
</script>

<style type="text/css">
* {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

html {
	-ms-touch-action: none;
}

body,ul,li {
	padding: 0;
	margin: 0;
	border: 0;
}

body {
	font-size: 12px;
	font-family: ubuntu, helvetica, arial;
	overflow: hidden; /* this is important to prevent the whole page to bounce */
}

#header {
	position: absolute;
	z-index: 2;
	top: 0;
	left: 0;
	width: 100%;
	height: 45px;
	line-height: 45px;
	background: #54a0e8;
	padding: 0;
	color: #eee;
	font-size: 20px;
	text-align: center;
	font-weight: bold;
}

#header a{color:white;}
#header a:link {
    text-decoration: none;
}

#footer {
	position: absolute;
	z-index: 2;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 0px;
	background: #444;
	padding: 0;
	border-top: 1px solid #444;
}

#footer p{
	text-align: center;
	color:white;
}

#wrapper {
	position: absolute;
	z-index: 1;
	top: 45px;
	bottom: 0;
	left: 0;
	width: 100%;
	background: #ccc;
	overflow: hidden;
}

#scroller {
	position: absolute;
	z-index: 1;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
	width: 100%;
	-webkit-transform: translateZ(0);
	-moz-transform: translateZ(0);
	-ms-transform: translateZ(0);
	-o-transform: translateZ(0);
	transform: translateZ(0);
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	-webkit-text-size-adjust: none;
	-moz-text-size-adjust: none;
	-ms-text-size-adjust: none;
	-o-text-size-adjust: none;
	text-size-adjust: none;
}

#scroller ul {
	list-style: none;
	padding: 0;
	margin: 0;
	width: 100%;
	text-align: left;
}

#scroller li {
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

#VOTEDOWN a{
	color:red;
	font-size: 12px;
}

#VOTEDOWN a:link {
    text-decoration: none;
}

#doneVoting{
	font-size:12px;
	color:#929292;
}


</style>
</head>
<body onload="loaded()">
<div id="header"><a href="postingpage.php">RatsValidator<a></div>
<div id="latest"><a href="index.php">Latest</a></div>
<div id="wrapper">
	<div id="scroller">
		<!-- TEST -->
<!-- PHP --> 
<?php
function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("s", "m", "h", "d", "w", "m", "y", "dec");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time()+(60*60*3)+(30*60); //messed up time thingy
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
	$con=mysql_connect("localhost","username", "password");
	mysql_select_db("validator");
	$sql="select *, (numYes - numNo) AS Sum from tester ORDER BY Sum DESC;";
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
	echo("<li><table style=\"width:100%;\">
		<tr>
		<td style=\"width:100%;\">$content</td>
		<td id=\"votes\" style=\"width:10%;\" \"colspan=\"2\">$votes</td>
		</tr>
		<tr>
		<td id=\"timeFormat\">$timeFormat</td> ");
	//if($posterIP != $user_ip){
	if(contains($user_ip, $voterIP) == false){ //checks if voter has already voted
		echo("<td id=\"VOTEUP\"><a href=\"voteyes.php?id=$id\">UP</a></td> ");
		echo("<td id=\"VOTEDOWN\"><a href=\"voteNo.php?id=$id\">DOWN</a></td> ");
	}
	else{
		echo("<td id=\"doneVoting\"><span>Done</span></td> ");
	}
	echo ("</tr></table>");
}
?>
</ul>
		
	</div>
</div>

<div id="footer"><p>COPYRIGHT 2015<p></div>

</body>
</html>