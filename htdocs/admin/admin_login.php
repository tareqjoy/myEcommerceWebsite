<?php
session_start();
define('access_database_connection',TRUE);
include_once ('../global/database_connection.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $userName = $_POST["username"];
    $password = $_POST['password'];

    $sql = "SELECT password FROM admin_user where username='$userName'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $gotPass = $row['password'];
            if ($gotPass != $password) {
                echo 2;
            }
            else
            {
                $_SESSION['username'] = $userName;
                echo 0;
            }
        }
    } else {
        echo 1;
    }
}
$conn->close();
?>
