<?php
    require('db/connect.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $idUser = $_COOKIE["idUser"];
        $img = $_GET['img'];
        $title = $_GET['title']; 
        $content = $_GET['content']; 
        $timestamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO posts (id, userId, img, title, content, timestamp) VALUES ('$id','$idUser','$img', '$title', '$content', '$timestamp')";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }
    echo true;
    mysqli_close($con);
?>