<?php
require('db/connect.php');
if(isset($_POST['id'])){
    $id =$_POST['id']; 
    $userId =$_POST['userId']; 
    $postId =$_POST['postId']; 
    $comment = $_POST['comment'];
    $timestamp = date("Y-m-d H:i:s");
    $query = "INSERT INTO comments (id, userId, postId, comment, timestamp) VALUES ('$id','$userId', '$postId','$comment', '$timestamp')";
    mysqli_query($con, $query) or die(mysqli_error($con));
}
echo true;
mysqli_close($con);
?>