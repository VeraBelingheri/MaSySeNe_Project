<?php
require('db/connect.php');
include("auth.php"); 

if (isset($_POST['id'])){

    $id = $_POST['id']; 
    $array = array();
    $q = mysql_query("SELECT * FROM 'users' WHERE 'id'=".$id);
    while($r=mysql_fetch_assoc($q))
    {
        $array['name'] = $row['name'];
        $array['email'] = $row['email'];
    }
    return $array;
}
else{
    return false;
}

?>