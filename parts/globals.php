<?php

session_start();

$user = null;

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

?>