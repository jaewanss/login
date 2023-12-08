<?php
if (isset($_REQUEST['register'])) {
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); // 비밀번호 암호화

    // 데이터베이스 연결
    $conn = new mysqli('localhost', 'your_username', 'your_password', 'your_database');
    
    // 연결 확인
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>