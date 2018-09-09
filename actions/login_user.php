<?php

$email = $_POST['email'];
$password = $_POST['password'];

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'clean_blog');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// hashed "asdasd" = "5fd924625f6ab16a19cc9807c7c506ae1813490e4ba675f843d5a10e0baacdb8"
$password = hash('sha256', $password);

$sql = "SELECT id, email, first_name, last_name, admin FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    session_start();
    
    $_SESSION['user'] = mysqli_fetch_assoc($result);
    
    header('location: ../index.php');
} else {
    header('location: ../login.php?invalid=1');
}

mysqli_close($conn);

