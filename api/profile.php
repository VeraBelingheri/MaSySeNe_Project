<?php
require('db/connect.php');
// include("auth.php"); 

    $array = [];
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($con,$_POST['id']); 
        $array = array();
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        while($row=mysqli_fetch_assoc($result))
        {
            $array['name'] = $row['name'];
            $array['email'] = $row['email'];
        }
    }
    echo json_encode($array);
    mysqli_close($con);
?>