<?php
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
	require('db.php');
   
    if (isset($_REQUEST['name'])){
		$name = stripslashes($_REQUEST['name']); 
		$name = mysqli_real_escape_string($con,$name); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (name, password, email, trn_date) VALUES ('$name', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>

<div class="col-md-3">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<div class="form-group">
<label>Name</label>
            <input type ="name" name="name" class="form-control" required />
            
            <label>Email Address</label>
            <input type ="email" name="email" class="form-control" required />
           
          
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
           
            
                <input type="submit" name="submit" class="btn btn-primary" value="Register">
                  
</form>
</div>
</div>


    <?php } ?>
</body>
</html>
