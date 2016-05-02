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
			<form class="form-signin" id="add-book-form" method="post" action="addBookForm.php">
				<h2 class="form-signin-heading">Add a new book</h2>

				<!-- Form filler thru ibsn -->
				<div>
					<p>Have the ISBN? Let us fill the rest for you</p>
					<div class="row">
						<div class="col-sm-10">
							<label for="book-ibsn" class="sr-only">Fill out ISBN</label>
							<input type="text" name="book-ibsn" id="book-ibsn" class="form-control" placeholder="Book ISBN" autofocus><br>
							
						</div>
						<div class="col-sm-2">
					        <button class="btn btn-success" id="autofill-book-button" type="button" id="forgot-login" onclick="fillForm();">Go!</button>
				        </div>
					</div>
				</div>

				<!-- book info -->
				<div>
					<input type="text" name="book-name" id="bookname" class="form-control" placeholder="Book Name">
				    <textarea name="description" class="form-control" rows="5" placeholder="Book Description" id="description"></textarea>
					<input type="text" name="condition" id="condition" class="form-control" placeholder="Book Condition">
					<input type="text" name="price" id="price" class="form-control" placeholder="Book Price ($)">
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
