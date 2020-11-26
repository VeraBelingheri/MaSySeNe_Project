<?php


include("auth.php"); //for the authentification ?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['email']; ?>!</p>

<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>


</div>
</body>
</html>
