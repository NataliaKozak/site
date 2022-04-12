
let price = 0;
let bonus;

$('.bye').mouseover(function(){
	text = this.innerHTML;
	$(this).text('Купить');
});
		
$('.bye').mouseout(function(){
	$(this).text(this.dataset.price + ' руб');
});

$(document).ready(function() {
	$('.down').click(function () {
		let $input = $(this).parent().find('input');
		let count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;

		if(count < 1){
			count = 1;
		}
		else{
			count = count;

			let coast = document.getElementsByClassName("coast")[0];

			if(price == coast.id){
				$('#total-price').html('Стоимость: ' + price + ' рублей');

				bonus = Math.round(price / 10);
				$('#total-bonus').html('Бонусы: ' + bonus );
			}
			else if(price == 0){
				price = coast.id;
				$('#total-price').html('Стоимость: ' + price + ' рублей');

				bonus = Math.round(price / 10);
				$('#total-bonus').html('Бонусы: ' + bonus );
			}
			else{
				price -=  coast.id;
				$('#total-price').html('Стоимость: ' + price + ' рублей');

				bonus = Math.round(price / 10);
				$('#total-bonus').html('Бонусы: ' + bonus );
			}
			
		}

		$input.val(count);
		$input.change();
		return false;
	});
	
	$('.up').click(function () {
		let $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		let d = this.id * $input.val;


		let coast = document.getElementsByClassName("coast")[0];
		let kolvo = document.getElementsByClassName("inputModal")[0];

		price = kolvo.value * coast.id;
		bonus = Math.round(price / 10);

		$('#total-price').html('Стоимость: ' + price + ' рублей');
		$('#total-bonus').html('Бонусы: ' + bonus );
		

		$input.change();
		return false;
	});
});



let modal = document.getElementById('myModal');
$('.bye').on('click', function(event) {
	modal.style.display = "block";
	bouquet_id = this.dataset.id;

	let request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if((request.readyState==4) && (request.status==200)){
			$('.modal-body').html(this.responseText);
		}
	}

	request.open('GET','modal.php?id=' + this.dataset.id, true); 
    request.send();
});

$('.box').on('click', function(event) {
	modal.style.display = "block";

	let request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if((request.readyState==4) && (request.status==200)){
			$('.modal-body').html(this.responseText);
		}
	}


    request.open('GET','modal.php?id=' + this.dataset.id, true); 
     		 
    request.send();
});

function closeModal(id){

	let request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if((request.readyState==4) && (request.status==200)){
			alert(this.response);
			
		}
	}

	let kolvo = document.getElementsByClassName("inputModal")[0];
	

    request.open('GET','addToBasket.php?bouquet=' + id + '&numerOf=' + kolvo.value, true); 		 
    request.send();


    modal.style.display = "none";

    

	return false;
}

function sendModal(id){

	let request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if((request.readyState==4) && (request.status==200)){
			document.location = 'basket.php';
			}
		}

	let kolvo = document.getElementsByClassName("inputModal")[0];
	

    request.open('GET','addToBasket.php?bouquet=' + id + '&numerOf=' + kolvo.value, true); 		 
    request.send();

    modal.style.display = "none";
	
	return false;
}


