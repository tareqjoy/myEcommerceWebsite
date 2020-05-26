

<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    die('Direct access not permitted');
} else {

    define('access_database_connection', TRUE);
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root . '/global/database_connection.php');

    if (isset($_GET['type'])) {
        $type = $_GET["type"];
        echo ('{"data":[');

        $sql = "";
        if (isset($_GET['search']) and !empty($_GET['search'])){
            $valu = $_GET['search'];
            $sql = "SELECT * FROM category WHERE id='".$valu."' OR name LIKE '%".$valu."%' ORDER BY sl";
        } else {
            $sql = "SELECT * FROM category ORDER BY sl";
        }
        $result = $conn->query($sql);
        $allowFlag = false;
        while ($row = $result->fetch_assoc()) {
            if($allowFlag){
                echo ',';
            }
            $id = $row['id'];
            $name = $row['name'];
            $image = $row['image'];
            $sl = $row['sl'];
            echo '{'
                .'"id":'.$id.','
                .'"name":"'.$name.'",'
                .'"image":"'.$image.'",'
                .'"sl":'.$sl
                .'}'
                ;
            $allowFlag = true;
        }

        echo(']}');
    } else {
        echo ("{error:not valid parameter}");
    }
}
?>