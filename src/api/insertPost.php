<?php

    include_once 'db/connect.php';

    $img = $_POST['img'];
    $title = $_POST['title']; 
    $content = $_POST['content']; 
    $timestamp = date("Y-m-d H:i:s");
    
    $query = "INSERT INTO posts (img, title, content, timestamp) VALUES ('$img', '$title', '$content', '$timestamp');";
    mysqli_query($con, $query);
   
    header("Location: dashboard.php?post=success");

?>
