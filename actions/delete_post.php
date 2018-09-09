<?php
require('../parts/globals.php');
if($user['admin']!=1){
    header('location: ../index.php');
    exit;
}

$post_id = $_GET['id_post'];
//create conection
$conn = mysqli_connect('localhost','root','','clean_blog');

//Check conection
if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}

//delete comments from post
$sql = "DELETE FROM comments WHERE post_id=$post_id" ;

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . mysqli_error($conn);
}

//delete posts
$sql = "DELETE FROM posts WHERE id=$post_id" ;

if (mysqli_query($conn, $sql)) {
    header('location: ../index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}