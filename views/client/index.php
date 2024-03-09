<?php
session_start();
ob_start();


require_once '../../autoload.php';



$page = $_GET['page'] ?? '';
switch ($page) {
    case 'otp-resend':
        $email = $_SESSION['email'];
        $otp = OtpDAO::getInstance()->generateOTP($email);
        SendEmail::getInstance()->send($email, $fullName, 'Xác nhận đăng ký', "Mã OTP của bạn là: $otp. Mã OTP sẽ hết hạn sau 5 phút.");
        header('Location: /views/client/otp.php');
        break;
    case 'otp':
        if (isset($_POST['otp-confirm']) && $_POST['otp-confirm']) {
            $otp = $_POST['otp'];
            $email = $_SESSION['email'];
            $result = OtpDAO::getInstance()->checkOtp($email, $otp);
            if ($result === 'OK') {
                $sql = "UPDATE users SET status = 'active' WHERE email = '$email'";
                UserDAO::getInstance()->register($sql);
                $_SESSION['email'] = null;
                header('Location: /views/client/login.php');
                die();
            }
            $_SESSION['error'] = $result;
            header('Location: /views/client/otp.php');
            die();
        }
        break;

    case 'logout':
        $_SESSION['user'] = null;
        header('Location: /views/client/login.php');
        break;
    case 'register':
        if (isset($_POST['register']) && $_POST['register']) {
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            if ($password !== $confirmPassword) {
                var_dump('Mật khẩu không khớp');
                $_SESSION['error'] = 'Mật khẩu không khớp';
                header('Location: /views/client/register.php');
                die();
            }
            $user = UserDAO::getInstance()->checkEmailExist($email);
            if ($user) {
                $_SESSION['error'] = 'Email đã tồn tại';
                header('Location: /views/client/register.php');
                die();
            }
            $sql = "INSERT INTO users (full_name, email, password) VALUES ('$fullName', '$email', '$password')";
            UserDAO::getInstance()->register($sql);
            $_SESSION['email'] = $email;
            $otp = OtpDAO::getInstance()->generateOTP($email);
            SendEmail::getInstance()->send($email, $fullName, 'Xác nhận đăng ký', "Mã OTP của bạn là: $otp. Mã OTP sẽ hết hạn sau 5 phút.");
            header('Location: /views/client/otp.php');
            die();
        }
        header('Location: /views/client/register.php');
        break;

    case 'login':
        if (isset($_POST['login']) && $_POST['login']) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = UserDAO::getInstance()->checkEmailExist($email);
            if (!$user) {
                $_SESSION['error'] = 'Email không tồn tại';
                header('Location: /views/client/login.php');
                die();
            }
            if ($user['password'] !== $password) {
                $_SESSION['error'] = 'Mật khẩu không đúng';
                header('Location: /views/client/login.php');
                die();
            }
            if ($user['status'] === 'inactive') {
                $_SESSION['email'] = $email;
                $otp = OtpDAO::getInstance()->generateOTP($email);
                SendEmail::getInstance()->send($email, $fullName, 'Xác nhận đăng ký', "Mã OTP của bạn là: $otp. Mã OTP sẽ hết hạn sau 5 phút.");
                header('Location: /views/client/otp.php');
                die();
            }
            $_SESSION['user'] = $user;
            header('Location: /views/' . ($user['role'] === 'admin' ? 'admin' : 'client') . '/index.php');
            die();
        }
        header('Location: /views/client/login.php');
        break;
    default:

        break;
}
include 'home.php';