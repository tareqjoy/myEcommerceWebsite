<?php
if (!defined('access_database_connection')){
  die('Direct access not permitted');
} else {

$servername = "localhost:3306";
    $username = "admin";
    $password = "admin";
    $dbname = "db";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    }
?>