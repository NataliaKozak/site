<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;


$name = $_GET['name'];
$type = $_GET['type'];
$price = $_GET['price'];
$img = $_GET['img'];

$query = mysqli_query($conn, "SELECT bouquet_id as id FROM bouquets WHERE bouquet_id=(SELECT max(bouquet_id) FROM bouquets)");

$row = mysqli_fetch_assoc($query);

$id = $row["id"] + 1;

$query = mysqli_query($conn, "INSERT INTO `bouquets`( `bouquet_id`, `nameOfTheBouquet`, `typeOfBouquet`, `price`, `pack_id`, `photo`) VALUES ('$id', '$name','$type','$price','1','$img')");

echo "Новый букет добавлен!";





?>