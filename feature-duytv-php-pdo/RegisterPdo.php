<?php
require_once "./db.php";
require_once './local.php';
if (isset($_POST['btnSubmite'])) {
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $cfpassword = $_POST['cfpassword'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $mailErr = "";
    $nameErr = "";
    $passwordErr = "";
    $cfpasswordErr = "";
    $phoneErr = "";
    $addressErr = "";

    //Kiểm tra email
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || strlen($mail) > 255) {
        $mailErr = "Địa chỉ email không đúng hoặc rỗng hoặc vượt quá 255 kí tự";
    }
    // Kiểm tra name
    if (strlen($name) == 0) {
        $nameErr = "Không để trống";
    }

    if ($nameErr === "" && (strlen($name) < 6 || strlen($name) > 200)) {
        $nameErr = "Độ dài họ và tên nằm trong khoảng 6 - 200 ký tự";
    }

    // Kiểm tra password và password confirm
    $removeWhiteSpacePassword = str_replace(" ", "", $password);
    if ((100 < strlen($password) || strlen($password) < 6) || (strlen($removeWhiteSpacePassword) != strlen($password))) {
        $passwordErr = "Mật khẩu không thỏa mãn đk (trong khoảng 6 - 100 ký tự và không chứa khoảng trắng)";
    }

    if ($password != $cfpassword) {
        $cfpasswordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
    }

    if (10 > strlen($phone) || strlen($phone) > 20) {
        $phoneErr = "Trong khoảng từ 10 - 20 kí tự";
    }

    if (strlen($address) == 0) {
        $addressErr = "Không để trống";
    }

    if ($nameErr . $emailErr . $passwordErr . $cfpasswordErr . $phoneErr . $addressErr != "") {
        header('location:' . BASE_URL . "register.php?nameErr=$nameErr&mailErr=$mailErr&passwordErr=$passwordErr&cfpasswordErr=$cfpasswordErr&phoneErr=$phoneErr&addressErr=$addressErr");
        die;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(mail,name,password,phone,address)VALUES('$mail','$name','$password','$phone','$address')";
    $stmt = $conn->prepare($sql);
    $user_sql = "SELECT username FROM users";
    $stmt->execute();
    header('location:login.php?message=Thêm dữ liệu thành công');
    die;
}
