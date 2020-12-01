<?php

require('db/connect.php');


if (isset($_POST['id_user'])){
    
    $id_user = $_POST['id_user']; 
    $id_user = mysqli_real_escape_string($con,$id_user); 
    $token = $_POST['token'];
    $token = mysqli_real_escape_string($con,$token);
    
    $query = "SELECT * FROM `users_log` WHERE id_user='$id_user' and token='$token'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

}

?>