
<?php
	require('db/connect.php');
	$token = false;
	if(isset($_POST['email'])){
		$email = stripslashes($_POST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$password=hash('SHA512',$password);

		$stmt = $con->prepare("SELECT id, name FROM `users` WHERE email= ? and password= ?");
        $stmt->bind_param("ss", $email, $password); 
        $con->query("START TRANSACTION");
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$con->query("COMMIT");

		$rows = mysqli_num_rows($result);
		if($rows==1){
			while($row = mysqli_fetch_assoc($result)){
				$idUser = $row["id"];
				$name = $row["name"];
			}
			$token=uniqid('', true);
		}
		if($token!=false){
			date_default_timezone_set('Europe/Rome');
			$now=date('Y-m-d H:i:s');

			$stmt = $con->prepare("INSERT INTO users_log(id_user,token,timestamp) VALUES(?, ?, ?)");
			$stmt->bind_param("sss", $idUser, $token, $now); 
			$con->query("START TRANSACTION");
			$stmt->execute();
			$stmt->close();
			$con->query("COMMIT");

		}
	}
	$obj=["idUser"=>$idUser,"token"=>$token,"name"=>$name];
	echo json_encode($obj);
	mysqli_close($con);
?>