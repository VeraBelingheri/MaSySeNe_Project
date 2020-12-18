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

		$stmt = $con->prepare("INSERT into `users` (id, name, password, email, trn_date) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $id, $name, $passwordSecured, $email, $trn_date); 
		$con->query("START TRANSACTION");
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$con->query("COMMIT");
		
		if($result){
			$check = true;
		}
	}
	echo $check;
	mysqli_close($con);
?>
