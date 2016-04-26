<!DOCTYPE html>
<html>
	<head>
		<title>Sell/Lend/Rent an Item</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="../js/marquee.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>


		<img src="../img/dog.jpeg">
		<img src="../img/cat.jpeg">
	</body>
</html>

<?php
	if (!isset($_COOKIE['loginCookieUser']))
	{
		$selfLink = 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';
		header('Location: ../login.php?notLogged=true&redirect=$selfLink');
	}