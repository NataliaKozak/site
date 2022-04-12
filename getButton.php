<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;

$id = $_GET['id'];
$razd = $_GET['razd'];


$query = mysqli_query($conn, "SELECT  *  FROM flowers WHERE flower_id = $id");


while($row = mysqli_fetch_assoc($query)){

	echo '
		<button id = "bye_'.$_GET['razd'].'" class = "but" data-input = "input_'.$_GET['razd'].'"  data-id = "'.$row["price"].'">'.$row["price"].' руб</button>
		</tr>
		';
	}



	//echo '<tr></tr>';
?>