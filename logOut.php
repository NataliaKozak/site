<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

unset($_SESSION['login']);
unset($_SESSION['id']);

print "<script language='Javascript' type='text/javascript'> 
                function reload(){}; 
                setTimeout('reload()', 0) 
            </script>";
?>