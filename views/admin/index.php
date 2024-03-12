<?php
session_start();
require_once '../../autoload.php';
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'product':
            if (isset($_GET['act'])) {
                switch ($_GET['act']) {
                    case 'add':
                        if (isset($_POST['add']) && $_POST['add']) {
                            $target_dir = "../../uploads/";
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            $uploadSuccess = FileUpload::getInstance()->upload($target_dir, $target_file);
                            switch ($uploadSuccess) {
                                case StatusUpload::FAKE_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::FAKE_IMG);
                                    break;
                                case StatusUpload::EXIST_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::EXIST_IMG);
                                    break;

                                case StatusUpload::FORMAT_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::FORMAT_IMG);
                                    break;

                                case StatusUpload::SIZE_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::SIZE_IMG);
                                    break;

                                case StatusUpload::ERROR:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::ERROR);
                                    break;
                                default:
                                    $product = Product::fromMethodPost($_POST, $target_file);
                                    $sql = $product->toInsertSql();
                                    break;
                            }
                            if (isset($title) && $title === 'Lỗi') {
                                echo "<script> alert('$body'); window.location.href='index.php?page=product&act=add';</script>";
                            } else {
                                ProductDAO::getInstance()->action($sql);
                                header('Location: index.php?page=product&act=add&status=ok');
                                exit();
                            }
                        }
                        break;
                    case 'edit':
                        if (isset($_POST['edit']) && $_POST['edit']) {
                            $id = $_POST['id'];
                            $target_dir = "../../uploads/";
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            $uploadSuccess = FileUpload::getInstance()->upload($target_dir, $target_file);
                            switch ($uploadSuccess) {
                                case StatusUpload::FAKE_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::FAKE_IMG);
                                    break;
                                case StatusUpload::EXIST_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::EXIST_IMG);
                                    break;

                                case StatusUpload::FORMAT_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::FORMAT_IMG);
                                    break;

                                case StatusUpload::SIZE_IMG:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::SIZE_IMG);
                                    break;

                                case StatusUpload::ERROR:
                                    $title = 'Lỗi';
                                    $body = StatusUpload::fromValue(StatusUpload::ERROR);
                                    break;
                                default:
                                    $product = new Product(
                                        $id,
                                        $_POST['name'],
                                        $_POST['price'],
                                        $_POST['des'],
                                        $_POST['stock'],
                                        $target_file,
                                        $_POST['category'],
                                        null
                                    );
                                    $sql = $product->toUpdateSql();
                                    break;
                            }
                            if (isset($title) && $title === 'Lỗi') {
                                echo "<script> alert('$body'); window.location.href='index.php?page=product&act=edit&id=$id';</script>";
                            } else {
                                ProductDAO::getInstance()->action($sql);
                                header('Location: index.php?page=product');
                                exit();
                            }
                        }
                        break;
                }
            }
            break;

        case 'logout':
            $_SESSION['user'] = null;
            header('Location: /QLCH_ThuCung/views/client/login.php');
            break;
    }
}

$page = $_GET['page'] ?? '';
include 'home.php';