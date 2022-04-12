<?php include "database.php" ;
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$_SESSION['flowerMenu'] = 0;
?>
<html>
<head>
	<link rel="stylesheet" href="ownBouquet.css">
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
							<?php include('menuOwn.php');

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



	<table class = "dd">
		<tr >
			<td class = "chooze">
				<div class = "tagline">
					<div>Соберите свой</div>
				</div>
			</td>	
		</tr>

		<tr>
			<td class = "chooze">
				<div class = "bel">идеальный букет</div>
			</td>
		</tr>
	</table>



	<div class = "create" id = "create">
		<div  id = "classCont0">
			<?php include("createFlowerMenuForOne.php") ?>
		</div>
		<div class = "classCont" id = "classCont1">
			<?php include("createFlowerMenuForOne.php") ?>
		</div>
		<div class = "classCont" id = "classCont2">
			<?php include("createFlowerMenuForOne.php") ?>
		</div>
		<div class = "classCont" id = "classCont3">
			<?php include("createFlowerMenuForOne.php") ?>
		</div>
		<div class = "classCont" id = "classCont4">
			<?php include("createFlowerMenuForOne.php") ?>
		</div>
		<div class = "classCont" id = "classCont5">
			<?php include("createFlowerMenuForOne.php") ?>
		</div>
		<div class = "addMoreFlowers" >Добавить цветок</div>

			
	</div>


	<div><button class = "lastButton"> 0 руб</button></div>


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


		$('.dropdown').click(function () {
			$(this).attr('tabindex', 1).focus();
			$(this).toggleClass('active');
			$(this).find('.dropdown-menu').slideToggle(300);

		});

		$('.dropdown').focusout(function () {
			$(this).removeClass('active');
			$(this).find('.dropdown-menu').slideUp(300);

		});

		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if((request.readyState==4) && (request.status==200)){
				$('.dropdown-menu').html(this.responseText);
			}
		}
		request.open('GET','nameOfFlower.php', true); 
		request.send();

		$('.dropdown .dropdown-menu li').click(function () {
			
			$(this).parents('.dropdown').find('span').text($(this).text());
			$(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));


			 

			let request = new XMLHttpRequest();
			let request1 = new XMLHttpRequest();

			request.onreadystatechange = function(){
				if((request.readyState==4) && (request.status==200)){
					$('.flowerInfo').html(this.responseText);
				}
			}

			request1.onreadystatechange = function(){
				if((request.readyState==4) && (request.status==200)){
					$('.addButton').html(this.responseText);



					let priceOfTheBouquet = 0;
					let allButtons = document.getElementsByClassName('bye');
					for(let i = 0; i < allButtons.length; i++){
						let priceOfOneFlower = allButtons[i].text().split(" ");
						priceOfTheBouquet += priceOfOneFlower[0];
					}
					$('.lastButton').text(priceOfTheBouquet);
				}
			}

			request.open('GET','getFlowerInfo.php?id=' + this.id, true); 
			request.send();
			request1.open('GET','getButton.php?id=' + this.id, true); 
			request1.send();
		});

		let price;


		$('.down').click(function () {
			let $input = $(this).parent().find('input');
			let id = this.id;
			let count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;

			if(count <= 1) count = 1;
			else{
				count = count;

				let coast = document.getElementById("bye_"+id);

				if(price == coast.dataset.id){
					$('#bye_'+id).html(price + ' руб');

					let priceOfTheBouquet = 0;
					let allButtons = document.getElementsByClassName('but');

					let bar = [].slice.call(allButtons);
					for(let i = 0; i < bar.length; i++){
						let priceOfOneFlower = bar[i].innerHTML.split(" ");

						priceOfTheBouquet += Number(priceOfOneFlower[0]);
					}
					$('.lastButton').text(priceOfTheBouquet + ' руб');


				}
				else{
					price -=  coast.dataset.id;
					$('#bye_'+id).html(price + ' руб');
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

			$input.val(count);
			$input.change();
			return false;
		});


		$('.up').click(function () {
			let $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			let id = this.id;


			let coast = document.getElementById("bye_"+id);
			let kolvo = document.getElementsByClassName("inputModal_"+id)[0];



			price = kolvo.value * coast.dataset.id;
			console.log(price);

			
			$('#bye_'+id).html(price + ' руб');

			let priceOfTheBouquet = 0;
			let allButtons = document.getElementsByClassName('but');

			let bar = [].slice.call(allButtons);
			for(let i = 0; i < bar.length; i++){
				let priceOfOneFlower = bar[i].innerHTML.split(" ");

				priceOfTheBouquet += Number(priceOfOneFlower[0]);
			}
			$('.lastButton').text(priceOfTheBouquet + ' руб');


			//$('.lastButton').html(price + ' руб');

			$input.change();
			return false;
	});

		let text;

		$('.lastButton').mouseover(function(){
			text = this.innerHTML;
			$(this).text('Создать');
		});

		$('.lastButton').mouseout(function(){
			$(this).text(text);
		});

		$('.lastButton').click(function () {

			let coast = text.split(" ")[0];
			let kolvo = document.getElementsByClassName("inputModal")[0];

			 

			let request = new XMLHttpRequest();

			request.onreadystatechange = function(){
				if((request.readyState==4) && (request.status==200)){
					alert(this.response);
				}
			}


			request.open('GET','createFlower.php?coast=' + coast, true); 
			request.send();

			window.location.href = 'ourBouquets.php';
		});

		let counter = 0;

		$('.addMoreFlowers').click(function(){
			counter++;
			$('#classCont'+counter).css('display','block');


			//console.log(counter);
			

		});

		$('.close').on('click', function(event) {
			let count = this.dataset.id - 1;
			$('#classCont'+count).remove();

			let priceOfTheBouquet = 0;
			let allButtons = document.getElementsByClassName('but');
			
			


			
			for(let i = 0; i < allButtons.length; i++){

				let priceOfOneFlower = Number(allButtons[i].dataset.id) ;
				let input = document.getElementById(allButtons[i].dataset.input);
				
				priceOfTheBouquet += priceOfOneFlower * Number(input.value);
				
			}
		$('.lastButton').text(priceOfTheBouquet + " руб");

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
				$('.dropdown').toggleClass('classSlad');
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
		
			
		



		

		




    

		

	</script>


	
</body>
</html>