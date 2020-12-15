<?php
    require('db/connect.php');
    $tokenDB = false;
    if(isset($_POST['idUser'])){
        $idUser = $_POST['idUser']; 
        $idUser = mysqli_real_escape_string($con,$idUser); 
        $token = $_POST['token'];
        $token = mysqli_real_escape_string($con,$token);
        $query = "SELECT token FROM `users_log` WHERE id_user='$idUser' and token='$token'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
            $tokenDB = $row['token'];
        }
    }
    echo json_encode($tokenDB);
    mysqli_close($con);
?>