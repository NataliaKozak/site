<?php
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include "database.php";
global $conn;

$category = $_GET['category'];
$sort = $_GET['sort'];


if($sort == "priceAsc" || $sort == "undefined"){

	if($category == 8){
		$query = mysqli_query($conn, "SELECT * FROM bouquets ORDER BY price ASC");
	}
	else{
		$query = mysqli_query($conn, "SELECT * FROM bouquets WHERE typeOfBouquet = '$category' ORDER BY price ASC");
	}
}
else if($sort == "priceDesc"){

	if($category == 8){
		$query = mysqli_query($conn, "SELECT * FROM bouquets ORDER BY price DESC");
	}
	else{
		$query = mysqli_query($conn, "SELECT * FROM bouquets WHERE typeOfBouquet = '$category' ORDER BY price DESC");
	}
}



while($row = mysqli_fetch_assoc($query)){

	echo '
		<div class = "box" data-id = "'.$row["bouquet_id"].'">
			<p class = "nameOf">'.$row["nameOfTheBouquet"].'</p>
				<div class = "slide-img">
				  	<img src = "'.$row["photo"].'" >
				 </div>

				<div class = "detail-box">
				  	<div class = "detal-box">
				  		<div class = "type">
				  			<button class = "bye" id = "addCategory" data-id = "'.$row["bouquet_id"].'" data-price = "'.$row["price"].'">'.$row["price"].' руб</button>
				  		</div>
				  	</div>
				</div>
		</div>
		';
	}









?>


<script type="text/javascript" src="functions.js"></script>
