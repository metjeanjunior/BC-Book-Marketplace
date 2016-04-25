<!DOCTYPE html>
<html>
	<head>
		<title>Book Marketplace</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="js/index.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>

		<div id="login-box">
			<form id="login-form" method="post" action="php/stuff.php">
				Enter your Info<br>
				<input type="text" name="userName" placeholder="Username"></input><br><br>
				<input type="password" name="password" placeholder="Password"></input><br>
				<a href="Reset">Forgot your password?</a><br><br>
				<input type="submit" name="submit-login" value="Give me the Goodies" />
			</form>
		</div>
	</body>
</html>