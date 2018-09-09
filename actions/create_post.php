
<?php

require('../parts/globals.php');

//check user
if($user['admin']!=1){
    header('location: index.php');
    exit;
}


// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'clean_blog');

$title = ($_POST['title']);
//$title = mysqli_real_escape_string($conn, $title);

$content = $_POST['content'];
//$content = mysqli_real_escape_string($conn, $content);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$user_id = $_SESSION['user']['id'];
$sql = "INSERT INTO posts (user_id, title,content, created_at) VALUES ('$user_id', '$title', '$content', NOW())";

if (mysqli_query($conn, $sql)) {
    header('location: ../index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);