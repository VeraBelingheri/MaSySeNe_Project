<?php
	require('db/connect.php');
	$check = false;
	if(isset($_POST['id'])){
		$id = mysqli_real_escape_string($con,$_POST['id']); 
		$name = stripslashes($_POST['name']); 
		$name = mysqli_real_escape_string($con,$name);
		$email = stripslashes($_POST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$passwordSecured=hash('SHA512',$password);
		$trn_date = date("Y-m-d H:i:s");
		$query = "INSERT into `users` (id,name, password, email, trn_date) VALUES ('$id', '$name', '$passwordSecured', '$email', '$trn_date')";
		$result = mysqli_query($con,$query);
		if($result){
			$check = true;
		}
	}
	echo $check;
	mysqli_close($con);
?>
