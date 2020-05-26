<script>
    function setValue(id, name) {
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
    }
</script>
<div class="editDiv">
    <p>ID</p>
    <input id="id" type="text" value="" disabled>
</br>
    <p>Name</p>
    <input id="name" type="text">
</div>

<?php
define('access_database_connection', TRUE);
$root = $_SERVER['DOCUMENT_ROOT'];
include($root.'/global/database_connection.php');
if (isset($_GET['id']) && isset($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    echo "<script> setValue(".$id.",'".$name."');</script>";
} else {
    

    $sql = "SELECT `AUTO_INCREMENT`
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'db'
    AND   TABLE_NAME   = 'category'";
    $result = $conn->query($sql);
    $allowFlag = false;
    while ($row = $result->fetch_assoc()) {
        $id = $row['AUTO_INCREMENT'];
        echo "<script> setValue(".$id.",".'""'.");</script>";
    }
}


?>