<?php

 
require('db/connect.php');
include("auth.php"); 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="form">
<p>Dashboard for book reviews</p>


<form action="insertPost.php" method="POST">
<input type="text" name="img" id="img" placeholder="Image..."> <br>
<input type="text" name="title" id="title" placeholder="Title..."> <br>
<input type="text" name="content" id="content" placeholder="Review..."><br>
<input type="submit" name="post" value="Post">
</form>


<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>

</div>
</body>
</html>
