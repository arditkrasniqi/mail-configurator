<?php
session_start();
require_once __DIR__.'/src/app/Router/Router.php';
require_once __DIR__.'/src/vendor/URL/URL.php';

$url = new URL("/");
?>
<html>
<head>
    <title>PHP Mailer Template</title>
    <link rel="stylesheet" href="public/libs/bootstrap-4.1/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <?php
        if(isset($_SESSION['loggedIn'])){
            require_once __DIR__.'/public/views/dashboard/index.php';
        }else{
            require_once __DIR__.'/public/views/login/index.php';
        }
    ?>
<script src="public/libs/jquery-3.3.1/jquery.min.js"></script>
<script src="public/libs/popper-1.11.0/popper.min.js"></script>
<script src="public/libs/bootstrap-4.1/js/bootstrap.js"></script>
<script src="public/js/app.js"></script>
</body>
</html>
