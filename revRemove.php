<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

include "database.php";
global $conn;

$id = $_GET['id'];


$query = mysqli_query($conn, "DELETE FROM `like_unlike` WHERE `comment_id` = '$id' ");
$query = mysqli_query($conn, "DELETE FROM `comments` WHERE `id` = '$id' ");


?>