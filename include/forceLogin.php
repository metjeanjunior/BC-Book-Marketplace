<?php
	if (!isset($_COOKIE['loginCookieUser']))
	{
		$selfLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		header('Location: login.php?notLogged=true&redirect='.$selfLink);
	}
	else
		echo $_COOKIE['loginCookieUser'];