<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'duytv';
try {
    $conn = new PDO("mysql:host=$hostname; dbname=$dbname; charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo " Lỗi kết lỗi dữ liệu<br>" . $e->getMessage();
}
