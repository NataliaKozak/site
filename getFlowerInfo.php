<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;

$id = $_GET['id'];


$query = mysqli_query($conn, "SELECT  *  FROM flowers WHERE flower_id = $id");

echo '<tr>
			<td class = "bold aaa">Цена</td>
			<td class = "bold">Описание</td>
			<td class = "bold">Фотография</td>
		</tr>';


while($row = mysqli_fetch_assoc($query)){

	echo '
		<tr>
			<td class = "textInfo aaa">'.$row["price"].' руб</td>
			<td class = "textInfo">'.$row["descr"].'</td>
			<td><img src = "'.$row["img"].'" class = "image "></td>
		</tr>
		';
	}

?>