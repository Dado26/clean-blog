<?php
require('../parts/globals.php');
if($user['admin']!=1){
    header('location: ../index.php');
    exit;
}

$comment_id = $_GET['comment_id'];
$post_id = $_GET['post_id'];
//create conection
$conn = mysqli_connect('localhost','root','','clean_blog');

//Check conection
if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}

$sql = "DELETE FROM comments WHERE id=$comment_id" ;

mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    header('location: ../post.php?id='.$post_id);
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
