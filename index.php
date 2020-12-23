<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./asset/js/jquery.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/nav.css">
    <style>
        body {
            background-image: url("./asset/img/first.jpg");
            background-size: cover;
        }
    </style>
</head>
<body>

<div class="first-page" style="height: 100%; width: 100%;">
    <?php include './common/navbar.php'; ?>
</div>
</body>
</html>
