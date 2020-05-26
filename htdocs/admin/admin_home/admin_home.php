<html>

<head>
    <title>
        MyWebsite | Admin Home
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin_home.css">
    <link rel="stylesheet" type="text/css" href="/admin/global/admin_header/admin_header.css">
</head>
<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    die("you must login to view this page");
}
?>

<body>
    <?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/admin/global/admin_header/admin_header.php'); 
    ?>

    <div class="editmenu">
        <input type="button" value="Category" onclick="location.href='/admin/admin_modify/admin_modify.php?type=categoty'">
        <hr>
        <input type="button" value="Sub Category">
        <hr>
        <input type="button" value="Product">
    </div>


</body>

</html>