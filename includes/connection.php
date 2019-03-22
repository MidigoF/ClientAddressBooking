<?php
  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "clientaddressbook";

  $conn = mysqli_connect($server, $user, $password, $db);

  if(!$conn){
    die("Connection to database failed");
  }
?>
