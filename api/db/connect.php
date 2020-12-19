<?php
$con = mysqli_connect("localhost","root","","networksecurity");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  header('Access-Control-Allow-Origin: http://localhost/project-team-insecure/'); 
  // header('Access-Control-Allow-Origin: http://localhost:3000'); 
  // header('Access-Control-Allow-Headers: Content-Type');
  header('Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization');
  header('Access-Control-Allow-Credentials: true'); 
  date_default_timezone_set("Europe/Rome");
?>
