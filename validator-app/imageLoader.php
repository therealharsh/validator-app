<!-- author: Harsh Keswani, @therealharsh -->

<html>
<style type="text/css">
body{
    background:rgba(0,0,0,0.2);
}

a{
    text-transform: uppercase;
    font-size:60px;
    color:#222;
}

a:link{
    text-decoration: none;
}

<?php
    $id=$_GET['id'];
?>
</style>
    <body>
        <img src="<?php echo "viewImage.php?id=$id" ?>"><br><br>
        <a href="index.php">CLICK HERE TO GO BACK</a>
    </body>
</html>