<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
include "database.php";
global $conn;


$id = $_GET['id'];


if(!isset($_SESSION['login'])){
	$src = "img/icon/like.png";
	$text = "Для добавления в избранное необходимо войти.";
}
else{
	$user = $_SESSION['id'];
	$query_isInFavorites = mysqli_query($conn, "SELECT COUNT(*) AS res FROM favorites WHERE user_id = '$user' AND bouquet_id = '$id'");

	if(mysqli_fetch_assoc($query_isInFavorites)["res"] == 0){
		$src = "img/icon/like.png";
		$text = "Добавить в избранное.";
	}
	else{
		$src = "img/icon/dislike.png";
		$text = "У Вас в избранном.";
	}
}

$query = mysqli_query($conn, "SELECT * FROM bouquets WHERE bouquet_id = '$id'");



$query_content = mysqli_query($conn, "SELECT * FROM content INNER JOIN flowers ON content.flower_id = flowers.flower_id WHERE content.bouquet_id = '$id'");



$query_favorites = mysqli_query($conn, "SELECT COUNT(*) as res FROM favorites WHERE bouquet_id = '$id'");








while($row = mysqli_fetch_assoc($query)){

	$count = mysqli_fetch_assoc($query_favorites)["res"];
	$bonus = $row["price"] / 10;
	echo '
	<form class = "addBou">
		<div>

			<div class = "mdBody">
				<div class = "nameOfB" id = "'.$row["bouquet_id"].'">'.$row["nameOfTheBouquet"].'
			</div>

			<div class = "modalImg">
				<img src = "'.$row["photo"].'">
			</div>

			<div class = "description">
				<img class = "icons" src = "img/icon/price.png">
				<div class = "coast" id = "'.$row["price"].'">Цена букета '.$row["price"].'  рублей.
				</div>
			</div>

			<div class = "description">
				<img class = "icons" src = "img/icon/bonus.png">
				<div class = "bonus" >За покупку этого букета вы получите '.$bonus.' бонусов.
				</div>
			</div>

			<div class = "description">
				<img class = "icons" src = "img/icon/favorites.png">
				<div class = "favorites-all" id = "'.$count.'"> В избранном у '.$count.' пользователей.
				</div>
			</div>

			<div class = "description">
				<img class = "icons" id = "favorites-icon" src = '.$src.'>
				<div class = "favorites"  id = "favorites"> '.$text.'
				</div>
			</div>

			<div class = "content">
				<div class = "name-content">Состав букета:</div>
			</div>';

			while($row_content = mysqli_fetch_assoc($query_content)){
				echo ' 
					<div class = "all-content">'.$row_content["flowerName"].'</div>
				';
			}


			echo '

			<div class = "content">
				<div class = "name-content">Итого:</div>
			</div>

			<div style="margin-top: -15px;">
				<div class = "total" id = "total-price">Стоимость: '.$row["price"].' рублей</div>
				<div class = "total" id = "total-bonus">Бонусы: '.$bonus.'</div>
				<div class="amount">
    				<span class="down">-</span>
    				<input class = "inputModal" type="text" value="1" readonly="readonly"/>
   	 				<span class="up">+</span> шт.
				</div>
			</div>

			

			
		</div>

		<button type = "button" class = "back" onclick = "closeModal(this.dataset.id) " title = "Добавить в корзину и вернуться к просмотру" data-id = "'.$row["bouquet_id"].'">Добавить в корзину
		</button>
		
		<button type = "submit" class = "submitModal" data-id = "'.$row["bouquet_id"].'" onclick = "sendModal(this.dataset.id)">Оформить заказ
		</button>
					
	
	</form>
		';
	}


?>

<script type="text/javascript" src="functions.js"></script>