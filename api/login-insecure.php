
<?php
	require('db/connect.php');
	$token = false;
	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$password =$_POST['password'];
		// $password=hash('SHA512',$password);
		$query = "SELECT id, name FROM `users` WHERE email='$email' and password='$password'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows>0){
			while($row = mysqli_fetch_assoc($result)){
				$idUser = $row["id"];
				$name = $row["name"];
			}
			$token=uniqid('', true);
		}
		setcookie('idUser',$idUser,time()+3600,"/");
		if($token!=false){
			date_default_timezone_set('Europe/Rome');
			$now=date('Y-m-d H:i:s');
			$sql="INSERT INTO users_log(id_user,token,timestamp) VALUES('$idUser','$token','$now')";
			mysqli_query($con, $sql) or die(mysqli_error($con));
		}
	}
	$obj=["idUser"=>$idUser,"token"=>$token,"name"=>$name];
	// header('Content-Type: application/json');

	echo json_encode($obj);
	mysqli_close($con);
?>