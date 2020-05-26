<html>

<head>
    <title>
        MyWebsite | Admin
    </title>
    <title>MyWebite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/admin/admin.css">
    <script src="jquery-3.5.1.js"></script>
</head>

<body>
    <form action="" method="post">
        <div class="form">
            <input type="text" name="username" id="username" placeholder="username" onchange="removeErrors()"><br />
            <p id="username_err" style="display: none">username is not found</p>
            <input type="password" name="password" id="password" placeholder="password" onchange="removeErrors()"><br />
            <p id="pass_err" style="display: none">wrong password</p>
            <input type="submit" value="LOG IN"><br />
        </div>
    </form>
</body>
<script type='text/javascript'>
    function removeErrors() {
        document.getElementById("username_err").style.display = "none";
        document.getElementById("pass_err").style.display = "none";
    }

    function usernameError() {
        document.getElementById("username_err").style.display = "block";
    }

    function passError() {
        document.getElementById("pass_err").style.display = "block";
    }


    $(function() {

        $('form').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/admin/admin_login.php',
                data: $('form').serialize(),
                success: function(data) {
                    if (data==1){
                        usernameError();
                    }
                    else if (data == 2) {
                        passError();
                    }
                    else if (data == 0) {
                        $(location).attr('href', '/admin/admin_home/admin_home.php')
                    } else {
                        alert(data);
                    }
                }
            });

        });

    });
</script>

</html>