<?php
    require('db/connect.php');
    if(isset($_POST['id'])){
        $id = $_GET['id'];
        $img = $_GET['img'];
        $title = $_GET['title']; 
        $content = $_GET['content']; 
        $timestamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO posts (id,img, title, content, timestamp) VALUES ('$id','$img', '$title', '$content', '$timestamp')";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }
    echo true;
    mysqli_close($con);
?>