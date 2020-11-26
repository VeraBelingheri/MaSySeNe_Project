<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Email/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="col-md-3">
<h1>Login In</h1>
<form name="login" action="" method="post">
<div class="form-group">
            
            <label>Email Address</label>
            <input type ="email" name="email" class="form-control" required />
           
          
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
           
            
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                  
</form>
</div>
</div>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

</div>
<?php } ?>


</body>
</html>
