<!DOCTYPE html>
<html>
	<head>
		<title>Sell/Lend/Rent an Item</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="../js/marquee.js"></script>
		<script src="../js/addBook.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>

		<div class="container">
			<form class="form-signin" id="add-book-form" method="get" action="loginCheck.php">
				<h2 class="form-signin-heading">Add a new book</h2>

				<!-- Form filler thru ibsn -->
				<div>
					<p>Have the IBSN? Let us fill the rest for you</p>
					<div class="row">
						<div class="col-sm-10">
							<label for="book-ibsn" class="sr-only">Email address</label>
							<input type="text" id="book-ibsn" class="form-control" placeholder="Book IBSN" autofocus><br>
							
						</div>
						<div class="col-sm-2">
					        <button class="btn btn-success" id="autofill-book-button" type="button" id="forgot-login" onclick="fillForm();">Go!</button>
				        </div>
					</div>
				</div>

				<!-- book info -->
				<div>
					<input type="text" name="book-name" class="form-control" placeholder="Book Name">
				</div>

		        <button class="btn btn-md btn-primary btn-block" id="reset" type="submit">Add Book</button>
	        </form>
		</div>
		<div class="container">
			<div id="standby">
				
			</div>
		</div>
		<!-- <img src="../img/dog.jpeg">
		<img src="../img/cat.jpeg"> -->
	</body>
</html>

<?php
	// if (!isset($_COOKIE['loginCookieUser']))
	// {
	// 	$selfLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	// 	header('Location: ../login.php?notLogged=true&redirect='.$selfLink);
	// }
