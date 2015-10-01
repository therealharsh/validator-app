<!-- author: Harsh Keswani, @therealharsh -->

<?php
$username = $_COOKIE['uratsvalidator'];
$addID = uniqid();
$target_dir = "uploads/";
$target_file = $target_dir . $addID.basename($_FILES["fileToUpload"]["name"]);
$fileName = $addID.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileChecker = basename($_FILES["fileToUpload"]["name"]);
$imageNullityUpdater = 0;
if($fileChecker != NULL){
	$imageNullityUpdater = 1;
}
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$ip = $_SERVER['REMOTE_ADDR']; 
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
$city = $query['city'];
$state = $query['regionName'];
$country = $query['country'];
}
else{
$city = "NULL";
$state = "NULL";
$country = "NULL";
}

$postContent=$_POST['name'];
$deviceInfo=$_SERVER['HTTP_USER_AGENT']; 
$device_info = addslashes($deviceInfo);
$server_address = $_SERVER['REMOTE_ADDR'];
$contentAddSlash = addslashes($postContent);
$content = strip_tags($contentAddSlash);

//the worst possible way to avoid whitespacing i was bored okay
//IGNORE THIS
if($content == NULL){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
	break;
}

if($content == ' '){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
	break;
}

if($content == '  '){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
	break;
}

if($content == '  '){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
	break;
}

if($content == '   '){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
	break;
}

if($content == '    '){
	echo "I HAD TO WRITE THIS EXTRA LINE OF CODE FOR A TWAT LIKE YOU";
	break;
}
//STOP IGNORING HERE

$con=mysql_connect("localhost","username", "password") or die(mysql_error());
mysql_select_db("validator");
$updateInfo = "INSERT INTO tester(date, time, content, ip_address, device_info, image_name, image_nullity, username, country, state, city, relevance) VALUES (NOW(), CURRENT_TIMESTAMP, '$content', '$server_address', '$device_info', '$fileName', $imageNullityUpdater, '$username', '$country', '$state', '$city', 1);";
if($content != NULL){
mysql_query($updateInfo, $con);
}
header("Location: index.php");



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo header("Location: index.php");
        $uploadOk = 1;
    } else {
        //echo header("Location: index.php");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo header("Location: index.php");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo header("Location: index.php");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo header("Location: index.php");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo header("Location: index.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo header("Location: index.php");
    } else {
        echo header("Location: index.php");
    }
}
?>