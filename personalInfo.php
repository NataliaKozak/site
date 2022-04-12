<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
include "database.php";
global $conn;

$user = $_SESSION['id'];


$query = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = $user");



while($row = mysqli_fetch_assoc($query)){

	$img = base64_encode($row['img']);

	echo '
		<img class = "person-img" src = "data:image/jpeg;base64, '.$img.'" onClick="changeImg();">

		<div class = "information-name">Имя пользователя: <span class = "necessarily">*</span></div> 
		<input type = "text" id = "name" name = "name"  class = "text-input" autocomplete="off" value = "'.$row["name"].'">
		<div id = "error-name"></div>

		<div class = "information-name" style = "padding-top: 10px">Логин: <span class = "necessarily">*</span></div> 
		<input type = "text" id = "login-name" name = "login-name"  class = "text-input" autocomplete="off" value = "'.$row["login"].'">
		<div id = "error-login"></div>

		<div class = "information-name" style = "padding-top: 10px">Телефон: <span class = "necessarily">*</span></div> 
		<input type = "text" id = "phone" name = "phone"  class = "text-input" autocomplete="off" value = "'.$row["phone"].'">
		<div id = "error-phone"></div>

		<div class = "information-name" style = "padding-top: 10px">Электронная почта: </div> 
			<input type = "text" id = "email" name = "email"  class = "text-input" autocomplete="off" value = "'.$row["email"].'" >
		<div id = "error-email"></div>

		<div class = "information-name adress" >Адресс: </div> 
		<input type = "text" id = "adress" name = "adress"  class = "text-input adress" autocomplete="off" value = "'.$row["adress"].'">
		<div id = "error-adress"></div>
		';
	}



?>