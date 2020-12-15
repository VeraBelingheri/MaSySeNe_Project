<?php
    require('db/connect.php');
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $userId = mysqli_real_escape_string($con,$_POST['userId']); 
        $postId = mysqli_real_escape_string($con,$_POST['postId']); 
        $comment = mysqli_real_escape_string($con,$_POST['comment']);
        $timestamp = date("Y-m-d H:i:s");

        $stmt = $con->prepare("INSERT INTO comments (id, userId, postId, comment, timestamp) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $id, $userId, $postId, $comment, $timestamp); 
        $con->query("START TRANSACTION");
		$stmt->execute();
		$stmt->close();
        $con->query("COMMIT");
    }
    echo true;
    mysqli_close($con);
?>