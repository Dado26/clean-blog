<?php
require('../parts/globals.php');

$comment = $_POST['comment'];
$post_id = $_POST['post_id'];
$user_id = $user['id'];

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'clean_blog');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comments (post_id, user_id, text, created_at) VALUES ('$post_id', '$user_id', '$comment', NOW())";

if (mysqli_query($conn, $sql)) {
    header('location: ../post.php?id='.$post_id);
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

