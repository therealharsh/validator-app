<!-- author: Harsh Keswani, @therealharsh -->
<!-- NOT IMPORTANT IGNORE -->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>RatsValidator</title>

		<link type="text/css" rel="stylesheet" href="css/demo.css" />
		<link type="text/css" rel="stylesheet" href="dist/css/jquery.mmenu.all.css" />

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="dist/js/jquery.mmenu.min.all.js"></script>
		<script type="text/javascript">
			$(function() {
				$('nav#menu').mmenu();
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


#foot {
  position: absolute;
  left: 0;
  bottom:10;
  width: 100%;
  height: 10%;
  background: #444;
  border-top: 1px solid #444;
}

#foot p{
  text-align: center;
  color:white;
}

#createPost{
  
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

.boxsizingBorder {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}

#uploadText{
  font-size:90%;
}

</style>



	</head>
	
		<div id="page">
			<div class="header">
				<a href="#menu"></a>
				RatsValidator
			</div>
			<div class="content">	
			<div id="cont">
			  <div id="tp">
			  <ul>
			  <li>

    <form id="createPost" action="post.php" method="post" enctype="multipart/form-data">
          <textarea type="text" name="name" id="name" maxlength="200" placeholder="What do you need validation for?" rows="10%" cols="100%" form="createPost" required></textarea>
            
          <label id="uploadText">Picture:</label>
          <input type="file" name="image"> 
          <input id="submitButton" type="submit" value="POST">

    </form>

  </li>
</ul>
    
  </div>
</div>

			</div>
	
			</div>
			<nav id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="postingpage.php">Create Post</a></li>
					<li><a href="#about">About us</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</div>
		<div id="foot"><p>Copyright © 2015 Harsh Keswani. All rights reserved.<br> Designed by therealharsh<p></div>
	
</html>