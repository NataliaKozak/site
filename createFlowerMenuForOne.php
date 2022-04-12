<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;

$user = $_SESSION['id'];
$counter = $_SESSION['flowerMenu'] + 1;
$_SESSION['flowerMenu'] = $counter;

echo '

<span class="close" title = "Удалить" data-id = "'.$counter.'">&times;</span>
<div class="dropdown" id = "dd">
	<div class="select">
		<span>Выберите цветок</span>
		<i class="fa fa-chevron-left"></i>
	</div>


	<input type="hidden" name="flower" class = "inp">
		<ul class="dropdown-menu" id = "'.$_SESSION['flowerMenu'].'"></ul>
</div>

<div class = "text">Количество:</div>
<div class="amount">
	<span class="down" id = "'.$_SESSION['flowerMenu'].'">-</span>
	<input class = "inputModal_'.$_SESSION['flowerMenu'].'" class = "in" type="text" value="1" id = "input_'.$counter.'"/>
	<span class="up" id = "'.$_SESSION['flowerMenu'].'">+</span>
</div>
		

<table class = "flowerInfo_'.$_SESSION['flowerMenu'].'" id = "flowerInfo"></table>
<div class = "addButton_'.$_SESSION['flowerMenu'].'"></div>
<hr>







';


?>

<script>

	
</script>