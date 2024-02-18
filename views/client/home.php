<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pet shop</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/client/images/favicon.png" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/client/css/plugins.css">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="/assets/client/css/bootstrap.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/assets/client/css/style.css">
    <link rel="stylesheet" href="/assets/client/css/responsive.css">
</head>

<body class="template-index belle template-index-belle">
    <div class="pageWrapper">
        <?php include 'search.form.php'; ?>
        <?php include 'top-header.php'; ?>
        <?php include 'header.php'; ?>
        <?php include 'mobile.menu.php' ?>
        <div id="page-content">
            <?php
            $page = $_GET['page'] ?? 'OK';
            if ($page === 'OK') {
                require_once('home.slider.php');
            }
            ?>
        </div>

    </div>


    <script src="/assets/client/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="/assets/client/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/assets/client/js/vendor/jquery.cookie.js"></script>
    <script src="/assets/client/js/vendor/wow.min.js"></script>
    <!-- Including Javascript -->
    <script src="/assets/client/js/bootstrap.min.js"></script>
    <script src="/assets/client/js/plugins.js"></script>
    <script src="/assets/client/js/popper.min.js"></script>
    <script src="/assets/client/js/lazysizes.js"></script>
    <script src="/assets/client/js/main.js"></script>
</body>

</html>