<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
include "database.php";
global $conn;



$query = mysqli_query($conn, "SELECT  *  FROM flowers ");


while($row = mysqli_fetch_assoc($query)){

	echo '
		<li id = "'.$row["flower_id"].'">'.$row["flowerName"].'</li>
		';
	}

?>

<script>
	$('.dropdown .dropdown-menu li').click(function () {
		
		$(this).parents('.dropdown').find('span').text($(this).text());
		$(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
		let razd = this.parentNode.id;

		let $input = document.getElementsByClassName("inputModal_" + razd)[0];
		$input.value = 1;
			
		let request = new XMLHttpRequest();
		let request1 = new XMLHttpRequest();

		request.onreadystatechange = function(){
			if((request.readyState==4) && (request.status==200)){
				$('.flowerInfo_'+razd).html(this.responseText);
			}
		}

		request1.onreadystatechange = function(){
			if((request.readyState==4) && (request.status==200)){
				$('.addButton_'+razd).html(this.responseText);
				
				let priceOfTheBouquet = 0;
				let allButtons = document.getElementsByClassName('but');

				let bar = [].slice.call(allButtons);
				for(let i = 0; i < bar.length; i++){
					let priceOfOneFlower = bar[i].innerHTML.split(" ");

					priceOfTheBouquet += Number(priceOfOneFlower[0]);
				}
				$('.lastButton').text(priceOfTheBouquet + ' руб');
			}

		}

		request.open('GET','getFlowerInfo.php?id=' + this.id, true); 
		request.send();
		request1.open('GET','getButton.php?id=' + this.id + '&razd=' + razd, true); 
		request1.send();




		$('.lastButton').text(priceOfTheBouquet);
	});


</script>