<?php

$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

if( empty($email) || empty($password) || empty($first_name) || empty($last_name) ){
    header('location: ../register.php?validation_error=1');
    exit;
}

if( strlen($password) < 6 ){
    header('location: ../register.php?validation_error=2');
    exit;
}


// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'clean_blog');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$password = hash('sha256', $password);

$sql = "INSERT INTO users (email, password, first_name, last_name, admin, created_at) VALUES ('$email', '$password', '$first_name', '$last_name', 0, NOW())";

if (mysqli_query($conn, $sql)) {
    header('location: ../login.php?success=1');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);