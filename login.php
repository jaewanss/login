<?php

$host = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'study';

if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // 데이터베이스 연결
    $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            echo "Login successful";
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }

    $conn->close();
}
?>