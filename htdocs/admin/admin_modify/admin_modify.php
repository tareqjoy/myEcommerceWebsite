<html>

<head>
    <title>
        MyWebsite | Admin Home
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin_modify.css">
    <link rel="stylesheet" type="text/css" href="/global/admin_header/admin_header.css">
    <link rel="stylesheet" type="text/css" href="../portion/category.css">
    <script src="/jquery-3.5.1.js"></script>
    <script src="/jqueryui/jquery-ui.js"></script>
</head>
<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    die("you must login to view this page");
}
if (!isset($_GET["type"]) || empty($_GET['type'])) {
    die("this page has no direct access");
}
?>

<body>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root . '/global/admin_header/admin_header.php'); ?>
    <div class="editmenu" id="editmenu">
        <div class="info">
            <div class="searchbar">
                <input type="text" placeholder="search here..." id="insearch">
                <img src="/img/logo/add.png">
            </div>
            <hr class="horizontalSpace">
            <div class="detailsbar">
                <div class="categoryDetails" style="display:none">
                    <img>
                    <p>001000</p>
                    <p>Electronics</p>
                </div>

            </div>
        </div>
        <hr class="verticalSpace">
        <div class="dlg">
            <div class="editHere">

            </div>
            <div class="buttons">
                <input type="button" value="Delete">
                <input type="button" value="Add">
            </div>
        </div>
    </div>

</body>
<script type="application/javascript">
    let searchParams = new URLSearchParams(window.location.search)
    pageHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    headerHeight = parseInt(getComputedStyle(header).height, 10);
    document.getElementById("editmenu").style.height = pageHeight - headerHeight;

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

    $('#insearch').on('keyup', function(){
        loadSidebar();
    });

    function loadSidebar() {
        $(function() {
            var src = $('#insearch').val();
            $.ajax({
                type: 'get',
                url: '/admin/portion/load_data.php',
                data: {
                    'type': searchParams.get('type'),
                    'search': src
                },
                dataType: 'json',
                success: function(data) {
                    $('.detailsbar').html('');

                    $.each(data.data, function(index, eliment) {

                        $('.detailsbar').append('<div class="categoryDetails"><img><p>' + pad(eliment.id.toString(), 2) + '</p><p>' + eliment.name + '</p></div>');
                    });

                },
                error: function(jqXHR, exception) {
                    alert(exception);
                }
            });


        });
    }
    loadSidebar();

    $(document).ready(function (){
        $('.detailsbar').sortable();
    });

    function loadForm(id, name, image) {
        $(function() {
            $.ajax({
                type: 'get',
                url: '/admin/portion/category_edit.php',
                data: {
                    'id': id,
                    'name': name,
                    'image': image
                },
                dataType: 'html',
                success: function(data) {
                    $('.edithere').html(data);

                },
                error: function(jqXHR, exception) {
                    alert(exception);
                }
            });
        });
    }
    loadForm();

</script>

</html>