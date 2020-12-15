
<?php
	require('db/connect.php');
    $q1 = "SELECT p.id, p.title, p.content, p.timestamp, p.userId, u.name FROM posts as p JOIN users as u on p.userId = u.id ORDER BY p.timestamp DESC";
    $q2 = "SELECT c.id, c.userId, c.postId, c.comment, u.name FROM comments as c JOIN users as u on c.userId = u.id";

    $result1 = mysqli_query($con, $q1);
    $result2 = mysqli_query($con, $q2);

    $json_array = [];
    $comments_array=[];
        while($row = mysqli_fetch_assoc($result2)){
            $comments_array[$row['postId']][]= array(
                'id' => $row['id'],
                'comment' => $row['comment'],
                'user' => array(
                    'userId' => $row['userId'],
                    'name' => $row['name'],
                )
            );
        }

        while($row = mysqli_fetch_assoc($result1)){
            $comments = [];
            if(array_key_exists($row['id'], $comments_array)){
                $comments = $comments_array[$row['id']];
            }

            $json_array[] = array(
                'postId' => $row['id'],
                'postTitle' => $row['title'],
                'postContent' => $row['content'],
                'timestamp' => $row['timestamp'],
                'comments' =>  $comments,
                'user' => array(
                    'userId' => $row['userId'],
                    'name' => $row['name'],
                )
            );
         }
         echo json_encode($json_array);
         mysqli_close($con);
?>