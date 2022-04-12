<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include "database.php";
global $conn;

$log = mysqli_real_escape_string($conn, $_POST["login"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

$queryForLogin = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$log'");
$resForLogin = mysqli_fetch_assoc($queryForLogin);
if(empty($resForLogin["login"])){
	print "<script language='Javascript' type='text/javascript'> 
                $('#errorLogin').html('Проверьте правильность логина.');
            </script>";
}
else{
	$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$log' AND `password` = '$password'");
	$res = mysqli_fetch_assoc($query);

	if(empty($res["login"]))
		print "<script language='Javascript' type='text/javascript'> 
                $('#errorPassword').html('Проверьте правильность пароля.');
            </script>";
    else{
    	$_SESSION['login'] = $log;
    	$_SESSION['id'] = $res["user_id"];
        $_SESSION['img'] = base64_encode($res['img']);

    	print "<script language='Javascript' type='text/javascript'> 
                location.href=location.href;
            </script>";
    }
}

?>


