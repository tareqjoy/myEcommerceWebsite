<script>
    function setValue(id, name) {
        document.getElementById('id').value = id;
        document.getElementById('nameInput').value = name;
    }


    function addClicked() {
        val = document.getElementById('nameInput').value;

        if (!val || val.length < 2) {
            $('#nameInput').removeClass('default-input').addClass('error-input');
            document.getElementById("nameInput").focus();

            showBubble("#nameInput", "right top","","Too short name");

        }

    }

    function removeError() {
        $('#nameInput').removeClass('error-input').addClass('default-input');
        removeBubble();
    }
</script>


<div class="editHere">
    <div class="editDiv">
        <p>ID</p><input id="id" type="text" class="default-input disabled-input" disabled>
        </br>
        <p>Name</p><input class="default-input" id="nameInput" type="text" value="none" autocomplete="off" onkeyup="removeError()">
    </div>
</div>

<div class="footerButtons">
    <div class="buttonsContainer">
        <input type="button" value="Delete" id="deleteButton">
        <input type="button" value="Add" id="addButton" onclick="addClicked()" ">
    </div>
</div>




<?php

define('access_database_connection', TRUE);
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/global/database_connection.php');
if (isset($_GET['id']) && isset($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    echo "<script> setValue('" . $id . "','" . $name . "');</script>";
} else {


    $sql = "SELECT `AUTO_INCREMENT`
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'db'
    AND   TABLE_NAME   = 'category'";
    $result = $conn->query($sql);
    $allowFlag = false;
    while ($row = $result->fetch_assoc()) {
        $id = $row['AUTO_INCREMENT'];
        echo ("<script> setValue('" . $id . "'," . '""' . ");</script>");
    }
}


?>