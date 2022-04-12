<?php include "database.php" ;
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="ourBouquets.css">
	<link rel="stylesheet" href="common-styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	 <script src="slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<meta charset="UTF-8" />
	<meta name = "viewport" content="width=device-width">
</head>
<body>
	<div class = "wrapper">
		<div class = "header">
			<div class = "container">
				<div class = "header__body">
					<div class = "logo">LAVANDER</div>
					<div class = "header_burger">
						<span></span>
					</div>
					<nav class = "header__menu">
						<ul class = "header__list">
							<?php include('menuOurB.php');

							if(!isset($_SESSION['login'])){
								echo '<li><a href="" class = "header_link logIn">Вход</a></li>';
							}
							if(isset($_SESSION['login'])){
								if($_SESSION['login'] != "admin"){
									
									echo '<li> <a href="basket.php" class = "header_link btn from-left">Личный кабинет</a> </li>';
								}
								
								echo '<li><a href="" class = "header_link logOut">Выход</a></li>';
								if($_SESSION['login'] != "admin"){
									echo "<script language='Javascript' type='text/javascript'> 
									$('.logOut').css('padding-left','435px');
									</script>";
								}
							}?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>



	<table class = "tt">
		<tr class = "dd">
			<td class = "chooze">
				<div class = "tagline">
					<div>Выберите свой</div>
				</div>
			</td>	

			<td class = "for">
				<form>
					<input type="text" placeholder="Поиск" class = "search">
					<button type="submit"></button>
				</form>

				<div class="cont">
					<div class="dropdown">
						<div class="select">
							<span>Сортировать по</span>
							<i class="fa fa-chevron-left"></i>
						</div>
						<input type="hidden" name="gender">
						<ul class="dropdown-menu">
							<li id="priceAsc">Возрастающей цене</li>
							<li id="priceDesc">Убывающей цене</li>
						</ul>
					</div>
				</div>



			</td>
		</tr>

		<tr>
			<td class = "chooze">
				<div class = "bel">идеальный букет</div>
			</td>
			<td rowspan ="3" class = "wrap">
				<!----слайдер товаров---->			
				  	<div class="slider multiple-items" id = "flowers">
				  		<?php include "allFlowers.php";?>
				  	</div>
			</td>
		</tr>
		<tr>
			<td>

				<ul class = "sections" id = "sections">
					<?php include "functions.php";
					menuItems();
					?>
				</ul>


				<!--<div class = "sorting">Диапазон цены</div>
				<div class="price-input">
					<div class="field">
						<input type="number" class="input-min" value="50" onchange = "checkInput();">
					</div>
					<div class="separator">-</div>
					<div class="field">
						<input type="number" class="input-max" value="100">
					</div>
				</div>

				<div class = "range-style">
					<div class = "range-discription">0</div>
					<div class="slider-price">
						<div class="progress"></div>
					</div>
					<div class = "range-discription">500</div>

					
					<div class="range-input">
						<input type="range" class="range-min" min="0" max="500" value="50" step="10">
						<input type="range" class="range-max" min="0" max="500" value="100" step="10">
					</div>
					
				</div> -->
				

				<div class = "someText">Не нашли подходящий? </div>
				<div class = "someText1">Составте свой собственный букет и мы посчитаем </div>
				<div class = "sometext2">стоимость сбора и доставки.</div>

				<button class = "compose" onClick='location.href="ownBouquet.php"'>составить</button>
			</td>	
		</tr>

	</table>


	<div id="myModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close" title = "Отмена">&times;</span>
			</div>

		 <div class="modal-body"></div>
		</div>
	</div>

	<div id="modal" class="loginModal">
		<div class="logmodal-content">
			<div class="logmodal-header">
				<span class="logclose" title = "Отмена">&times;</span>
				<p class="welcome">Добро пожаловать в Lavender!</p>
			</div>

			<div class="logmodal-body">
				<form  class = "formLogIn"  id = "formLogIn" method = "post" action = "logIn.php">
					<div>
						<div>
							<input type = "text" id = "login" name = "logIn" placeholder="Логин" autocomplete="off" >
						</div>

						<div id = "errorLogin"></div>

						<div class = "password">
							<input type = "password" id = "password" name = "password" placeholder="Пароль">
							<a href="#" class="password-control"></a>
						</div>

						<div id = "errorPassword"></div>

						<button type = "button" id = "buttonLogIn">Вход</button>
						<p class = "acc">Ещё нет аккаунта?</p>
						

					</div>		

				</form>
			</div>
		</div>
	</div>

	<div id="modalRegistration" class="modalRegistration">
		<div class="registration-content">
			<div class="registration-header">
				<span class="registration-close" title = "Отмена">&times;</span>
				<p class="welcome">Регистрация</p>
			</div>

			<div class="registration-body">

				<form  class = "registration-form"  id = "form" method = "post" >
					<div>
						<span class = "desc"> Имя Фамилия: </span>
						<div>
							<input type = "text" id = "name" name = "name"  class = "textInput"autocomplete="off" >
						</div>

						<span class = "desc"> Логин: </span>
						<div>
							<input type = "text" id = "loginReg" name = "name"  class = "textInput"autocomplete="off" >
						</div>

						<span class = "desc"> Пароль: </span>
						<div>
							<input type = "password" id = "passwordNew" name = "position"  class = "textInput"autocomplete="off" >
						</div>

						<span class = "desc"> Повторите пароль: </span>
						<div>
							<input type = "password" id = "passwordNewRep" name = "position"  class = "textInput"autocomplete="off" >
						</div>
               			




						

						<button type = "button" id = "buttonAdd">Регистрация</button>
						<div id = "error"></div>

					</div>

					
					

				</form>
			</div>
		</div>
	</div>


	<script>

		$('div.logo').on('click', function(event) {
			window.location.href = 'firstPage.php';
		});

		let sortProperty;
		let category = 8;

		function getLastSlide(){
    		return ($(".slider").slick("getSlick").slideCount - 1);
		}

		$('.multiple-items').slick({
			slidesToShow: 3,
        	slidesToScroll: 1,
        	infinite: true,
			responsive: [
    		
        		{
	      breakpoint: 780,
	      settings: {
	        slidesToShow: 6,
	      }
	    },
	    {
	      breakpoint: 416,
	      settings: {
	        slidesToShow: 2
	      }
	    
    }]});
		

		function changeCategory(category, sortPr = sortProperty){
			var request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if((request.readyState==4) && (request.status==200)){
					$('.box').remove();
          			$('.slider').slick('slickAdd', this.responseText );
          			$('.slider').slick('slickRemove', getLastSlide());

				}
			}

     		request.open('GET','changeСategory.php?category=' + category + '&sort=' + sortPr, true); 
     		request.send();

		}



		

		$('.sections').on('click', 'li.section', function(){
			$(this).addClass('on').siblings('.section').removeClass('on');
			category = this.id;
			changeCategory(this.id);
     	});


		let ul = document.getElementById('sections');
		ul.addEventListener('click', function(e){
			let target = e.target;
			if(target.tagName == 'LI'){

			}
		});
		

		


		$('div.logo').on('click', function(event) {
			window.location.href = 'firstPage.php';
		});


		$('.bye').mouseover(function(){
			text = this.innerHTML;
			$(this).text('Просмотр');
		});

		$('.bye').mouseout(function(){
			$(this).text(this.dataset.price + ' руб');
		});


		let modal = document.getElementById('myModal');
		let span = document.getElementsByClassName("close")[0];
		



		$('.bye').on('click', function(event) {
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

		span.onclick = function() {
		    modal.style.display = "none";
		}

		
	


		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}



		$('.dropdown').click(function () {
			$(this).attr('tabindex', 1).focus();
        	$(this).toggleClass('active');
        	$(this).find('.dropdown-menu').slideToggle(300);
        });

        $('.dropdown').focusout(function () {
        	$(this).removeClass('active');
        	$(this).find('.dropdown-menu').slideUp(300);
    	});

    	$('.dropdown .dropdown-menu li').click(function () {
        	$(this).parents('.dropdown').find('span').text($(this).text());
        	$(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));

        	sortProperty = this.id;
        	changeCategory(category);

    	});

    	let modalLog = document.getElementById('modal');
    	let logClose = document.getElementsByClassName("logclose")[0];
    	$('.logIn').on('click', function(event) {
			modalLog.style.display = "block";
			return false;
		});

		logClose.onclick = function() {
		    modalLog.style.display = "none";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modalLog.style.display = "none";
		    }
		}

		$("#login").click(function(){
			$('#errorLogin').html('');
		});

		$("#password").click(function(){
			$('#errorPassword').html('');
		});

		$( document ).ready(function() {
			$("#buttonLogIn").click(
				function(){

					if($("#login").val() == "" || $("#password").val() == ""){
						if($("#login").val() == "")
							$('#errorLogin').html('Это поле не может быть пустым');
						if($("#password").val() == "")
							$('#errorPassword').html('Это поле не может быть пустым');
					}
					else{
						let login = $("#login").val();
						let password = $("#password").val();

						$.ajax({
							url: 'logIn.php',
							method: 'POST',
							data: {
								login: login,
								password: password
							},
							success: function(response){						 
								$("#errorPassword").html(response);
							}
						});
					}
							
					
				});

			$('.header_burger').click(
				function(){
					$('.header_burger, .header__menu').toggleClass('active');
					console.log("Fff");
					$('.slick-slider, .search').toggleClass('classSlad');
				});

		});

		$('.logOut').on('click', function(event) {
			 $.ajax({
				url: 'logOut.php',
				method: 'POST',
				success: function(response){						 
					$(".text").html(response);
					location.reload();
					}
			});
			
		});
		$(document).ready(function() {
 
   
    $(".search").keydown(function(e) {
        if(e.keyCode === 13){
        	let name = $('.search').val();

        	let request = new XMLHttpRequest();
        	request.onreadystatechange = function(){
        		if((request.readyState == 4) && (request.status == 200)){
        			$('.box').remove();
            		$('.slider').slick('slickAdd', this.responseText );
            		$('.slider').slick('slickRemove', getLastSlide());
        		}
        	}

        	request.open('GET', 'search.php?name=' + name, true);
        	request.send();
        	return false;
        	
                    
               
 
        
        }
 
    });


 
});
 
		let modalRegistration = document.getElementById('modalRegistration');
		let spanRegistration = document.getElementsByClassName("registration-close")[0];

		$('.acc').on('click', function(event) {
			modalRegistration.style.display = "block";
			return false;

		});

		spanRegistration.onclick = function() {
		    modalRegistration.style.display = "none";
		}

		window.onclick = function(event) {
		    if (event.target == modalRegistration) {
		        modalRegistration.style.display = "none";
		    }
		}

		$( document ).ready(function() {
			$("#buttonAdd").click(
				function(){

					if($("#name").val() == ""){
						$('#error').html('Заполните все поля');
					}
					else if($("#loginReg").val() == ""){
						$('#error').html('Заполните все поля');
					}
					else if($("#passwordNew").val() == ""){
						$('#error').html('Заполните все поля');
					}
					else if($("#passwordNewRep").val() == ""){
						$('#error').html('Заполните все поля');
					}
					else if($("#passwordNewRep").val() != $("#passwordNew").val()){
						$('#error').html('Пароли не совпадают');
					}

					else {
						let name = $("#name").val();
						let loginReg = $("#loginReg").val();
						let passwordNew = $("#passwordNew").val();
						let passwordNewRep = $("#passwordNewRep").val();

						let request = new XMLHttpRequest();

						request.onreadystatechange = function(){
							if((request.readyState==4) && (request.status==200)){
								$('#error').html(this.responseText);
								if($('#error').html() == "")
									location.reload();
								}
						}

						request.open('GET','registr.php?name=' + name + '&loginReg=' + loginReg + '&passwordNew=' + passwordNew + '&passwordNewRep=' + passwordNewRep, true); 
						request.send();
					}
				});
		});


		$('body').on('click', '.password-control', function(){
			if ($('#password').attr('type') == 'password'){
				$(this).addClass('view');
				$('#password').attr('type', 'text');
			} else {
				$(this).removeClass('view');
				$('#password').attr('type', 'password');
			}
			return false;
		});

		
		$('body').on('click', '#favorites-icon', function(){

			let icon = document.getElementById("favorites-icon");
			let text = document.getElementsByClassName("favorites-all")[0];

			if(document.getElementById("favorites").innerHTML.includes("Для добавления в избранное необходимо войти."))
				return false;

			else if(document.getElementById("favorites").innerHTML.includes("Добавить в избранное.")){
				

				$.ajax({
					url: 'addToFavorites.php',
					method: 'POST',
					data:{
						bouquet_id: document.getElementsByClassName("nameOfB")[0].id
					},
					success: function(response){
						icon.src = "img/icon/dislike.png";
						document.getElementById("favorites").innerText = "У Вас в избранном.";
						text.innerText = "В избранном у "+ response.trim() +" пользователей.";
					}
				});

				
			}
			else{
				

				$.ajax({
					url: 'removeFromFavorites.php',
					method: 'POST',
					data:{
						bouquet_id: document.getElementsByClassName("nameOfB")[0].id
					},
					success: function(response){
						icon.src = "img/icon/like.png";
						document.getElementById("favorites").innerText = "Добавить в избранное.";
						text.innerText = "В избранном у "+ response.trim() +" пользователей.";
					}
				});
			}

			return false;
		});


		const rangeInput = document.querySelectorAll(".range-input input"),
		priceInput = document.querySelectorAll(".price-input input"),
		range = document.querySelector(".slider-price .progress");
		let priceGap = 10;

		priceInput.forEach(input =>{
			input.addEventListener("input", e =>{
				let minPrice = parseInt(priceInput[0].value),
				maxPrice = parseInt(priceInput[1].value);

				if(priceInput[0].value < 0 || priceInput[1].value < 0){
					priceInput[0].value < 0 ? priceInput[0].value = 0 : priceInput[1].value = 0;
				}
				if(priceInput[1].value > 500)
					priceInput[1].value = 500;

				if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
					if(e.target.className === "input-min"){
						rangeInput[0].value = minPrice;
						range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
					}else{
						rangeInput[1].value = maxPrice;
						range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
					}
				}
			});
		});

		rangeInput.forEach(input =>{
			input.addEventListener("input", e =>{
				let minVal = parseInt(rangeInput[0].value),
				maxVal = parseInt(rangeInput[1].value);
				if((maxVal - minVal) < priceGap){
					if(e.target.className === "range-min"){
						rangeInput[0].value = maxVal - priceGap
					}else{
						rangeInput[1].value = minVal + priceGap;
					}
				}else{
					priceInput[0].value = minVal;
					priceInput[1].value = maxVal;
					range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
					range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
				}
			});
		}); 

		function checkInput(){
			inputMin = document.querySelector('.input-min');
			alert("d");
		}


		const inputMin = document.querySelector('.input-min');
		inputMin.addEventListener('onchange', (event) => {
			if(inputMin.val() < 0)
				inputMin.val() = 0;
		});
	</script>


	
</body>
</html>