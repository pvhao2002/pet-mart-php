<?php
session_start();
ob_start();
header('Location: /views/client/index.php');
// $currentUrl = $_SERVER['REQUEST_URI'];
// if (strpos($currentUrl, 'admin') !== false) {
//     // check if the user is an admin
//     // if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'admin') {
//     //     header('Location: /views/client/index.php');
//     // }
//     header('Location: /views/admin/index.php');
// } else {
//     header('Location: /views/client/index.php');
// }