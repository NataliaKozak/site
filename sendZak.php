<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;

$dostvalue = mysqli_real_escape_string($conn, $_POST["dostvalue"]);
$adressValue = mysqli_real_escape_string($conn, $_POST["adressValue"]);
$oplValue = mysqli_real_escape_string($conn, $_POST["oplValue"]);
$forhValue = mysqli_real_escape_string($conn, $_POST["forhValue"]);
$date = date("j.n.Y");
$time = date("H:i:s");
$user = $_SESSION['id'];

$query = mysqli_query($conn, "INSERT INTO `orders`( `user_id`, `dost`, `adress`, `opl`, `forh`, `date`) VALUES ('$user', '$dostvalue','$adressValue','$oplValue','$forhValue', '$date')");

$query = mysqli_query($conn, "DELETE FROM `basket` WHERE  `user_id` = '$user'");


	echo $forhValue;
?>