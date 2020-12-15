<?php
    require('db/connect.php');
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $userId = mysqli_real_escape_string($con,$_POST['userId']);
        $img = mysqli_real_escape_string($con,$_POST['img']);
        $title = mysqli_real_escape_string($con,$_POST['title']);
        $content = mysqli_real_escape_string($con,$_POST['content']);
        $timestamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO posts (id, userId, img, title, content, timestamp) VALUES ('$id','$userId', '$img', '$title', '$content', '$timestamp')";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }
    echo true;
    mysqli_close($con);
?>