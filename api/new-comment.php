<?php
    require('db/connect.php');
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $userId = mysqli_real_escape_string($con,$_POST['userId']); 
        $postId = mysqli_real_escape_string($con,$_POST['postId']); 
        $comment = mysqli_real_escape_string($con,$_POST['comment']);
        $timestamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO comments (id, userId, postId, comment, timestamp) VALUES ('$id','$userId', '$postId','$comment', '$timestamp')";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }
    echo true;
    mysqli_close($con);
?>