<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;


$name = $_GET['name'];
$position = $_GET['position'];
$workDisc1 = $_GET['workDisc1'];
$workDisc2 = $_GET['workDisc2'];
$workDisc3 = $_GET['workDisc3'];
$img = $_GET['img'];

$query = mysqli_query($conn, "SELECT id_worker as id FROM workers WHERE id_worker=(SELECT max(id_worker) FROM workers)");

$row = mysqli_fetch_assoc($query);

$id = $row["id"] + 1;

$query = mysqli_query($conn, "INSERT INTO `workers`(`id_worker`, `name`, `position`, `workDisc1`, `workDisc2`, `workDisc3`, `photo`) VALUES ('$id','$name','$position','$workDisc1','$workDisc2','$workDisc3','$img')");

echo "Новый сотрудник добавлен!";





?>