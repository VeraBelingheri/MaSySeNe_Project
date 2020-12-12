<?php

 
require('db/connect.php');
include("auth.php"); 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<?php

    if (isset($_POST['post'])) {
    
    $userId =$_POST['userId']; 
    $img = $_POST['img'];
    $title = $_POST['title']; 
    $content = $_POST['content']; 
    $timestamp = date("Y-m-d H:i:s");

    if (strlen($title) < 1 || strlen($content) < 1 ) {
        die ('You have not inserted a title or a review!');
    }
    
    $query = "INSERT INTO posts (userId, img, title, content, timestamp) VALUES ('$userId', '$img', '$title', '$content', '$timestamp');";
    mysqli_query($con, $query);

    }

    if (isset($_POST['share'])) {

        $userId =$_POST['userId']; 
        $comment = $_POST['comment'];
        $timestamp = date("Y-m-d H:i:s");
    
        if (strlen($comment) < 1) {
            die ('You have not inserted any comment!');
        }
        
        $query = "INSERT INTO comments (userId, comment, timestamp) VALUES ('$userId', '$comment', '$timestamp');";
        mysqli_query($con, $query);
    
        }
    
    $q1 = "SELECT * FROM posts JOIN users;";
    $q2 = "SELECT * FROM comments JOIN users;";

    $result1 = mysqli_query($con, $q1);
    $result2 = mysqli_query($con, $q2);

        while($row = mysql_fetch_assoc($result2)){

            $comments_array=[];
            $comments_array['posts.id']= array(
                'comment' => $row['comment'],
                'user' => array(
                    'userId' => $row['userId'],
                    'name' => $row['name'],
                )
            );
        }

        while($row = mysql_fetch_assoc($result1)){

            $json_array = [];
            $json_array['posts.id'] = array(
                'postId' => $row['Id'],
                'postTitle' => $row['title'],
                'postContent' => $row['content'],
                'comment' => $comments_array['$posts.id'],
                'user' => array(
                    'userId' => $row['userId'],
                    'name' => $row['name'],
                )
            );
         }
    
    $array = var_dump($json_array);
    echo json_encode($array);
?>

<div class="form">
<p>Dashboard for book reviews</p>


<form action="dashboard.php" method="POST">
<input type="text" name="img" id="img" placeholder="Image..."> <br>
<input type="text" name="title" id="title" placeholder="Title..."> <br>
<input type="text" name="content" id="content" placeholder="Review..."><br>
<input type="submit" name="post" value="Post">
</form>

<form action="dashboard.php" method="POST">
<input type="text" name="comment" id="comment" placeholder="Comment..."><br>
<input type="submit" name="share" value="Share">
</form>

<?php 
$query = "SELECT img, title, content FROM posts;";
if($result = mysqli_query($con, $query)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<span>" . $row['img'] . "</span>";
                echo "<span>" . $row['title'] . "</span>";
                echo "<span>" . $row['content'] . "<hr/></br/></span>";
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
}

?>
<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>

</div>
</body>
</html>
