<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;


$name = $_GET['name'];
$loginReg = $_GET['loginReg'];
$passwordNew = $_GET['passwordNew'];
$passwordNewRep = $_GET['passwordNewRep'];


$queryForLogin = mysqli_query($conn, "SELECT * FROM users WHERE login = '$loginReg'");
$resForLogin = mysqli_fetch_assoc($queryForLogin);

if(!empty($resForLogin["login"])){
	echo "Данный логин занят";
}
else{
	$query = mysqli_query($conn, "SELECT user_id as id FROM users WHERE user_id=(SELECT max(user_id) FROM users)");

	$row = mysqli_fetch_assoc($query);

	$id = $row["id"] + 1;

	$query = mysqli_query($conn, "INSERT INTO `users`(`user_id`, `login`, `password`) VALUES ('$id','$loginReg','$passwordNew')");


	$_SESSION['login'] = $loginReg;
	$_SESSION['id'] = $id;

	echo "";
}












?>