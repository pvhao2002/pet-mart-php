<?php
$page = $_GET['page'] ?? '';
switch ($page) {
    case 'shop':

        break;

    case 'logout':
        $_SESSION['user'] = null;
        header('Location: /views/client/login.php');
        break;
    default:

        break;
}
include 'home.php';