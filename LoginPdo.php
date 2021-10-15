<?php
session_start();
require_once "./db.php";
require_once "./local.php";
if (isset($_POST['btnLogin'])) {
    $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $mailErr = '';
    $passwordErr = '';
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || strlen($mail) > 255) {
        $mailErr = "Địa chỉ email rỗng hoặc vượt quá 255 kí tự";
    }
    // if ("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,100}$") {
    //     $passwordErr = "Mật khẩu không thỏa mãn đk (trong khoảng 6 - 100 ký tự và không chứa khoảng trắng có ít nhất 1 chữ hoặc số)";
    // }
    if ($mailErr . $passwordErr != "") {
        header('location: ' . BASE_URL . "login.php?mailErr=$mailErr&passwordErr=$passwordErr");
        die;
    }

    extract($_REQUEST);
    //kiểm tra user có tồn tại hay không 
    $sql = "SELECT * FROM users WHERE mail = '$mail'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user != false) {
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['mail'] = $user['mail'];
            header("location:LoginSuccess.php");
            die;
        } else {
            $passwordErr = "Mật khẩu không chính xác!!!";
        }
    } else {
        $mailErr = "Mail không đúng!!!";
    }
}
