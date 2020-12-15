<?php
require('db/connect.php');
// include("auth.php"); 

    $array = [];
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($con,$_POST['id']); 
        $array = array();

        $stmt = $con->prepare("SELECT * FROM users WHERE id= ?");
		$stmt->bind_param("s", $id); 
		$con->query("START TRANSACTION");
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$con->query("COMMIT");

        while($row=mysqli_fetch_assoc($result))
        {
            $array['name'] = $row['name'];
            $array['email'] = $row['email'];
        }
    }
    echo json_encode($array);
    mysqli_close($con);
?>