<?php include "database.php" ;
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="personalArea.css">
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
							<?php include('menuPersonalArea.php');

							if(!isset($_SESSION['login'])){
								echo '<li><a href="" class = "header_link logIn">Вход</a></li>';
							}
							if(isset($_SESSION['login'])){
								if($_SESSION['login'] != "admin"){
									
									echo '<li> <a href="basket.php" class = "header_link btn from-left now">Личный кабинет</a> </li>';
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

	<div class = "name-of-area">Личная информация
		<form class = "personal-information">
			<?php include('personalInfo.php');?>


			<button type = "button" id = "button-change">Сохранить изменения</button>

		</form>
	</div>


	








	<script>

		

		$('div.logo').on('click', function(event) {
			window.location.href = 'firstPage.php';
		});

		



		$('.logOut').on('click', function(event) {
			 $.ajax({
				url: 'logOut.php',
				method: 'POST',
				success: function(response){	
					window.location.href = 'firstPage.php';
					}
			});
			
		});

		function changeImg(){
			let reader = new FileReader();
		}

		



		
	
			


		

	</script>


	
</body>
</html>