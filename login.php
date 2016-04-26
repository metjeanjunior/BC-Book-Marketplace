<!DOCTYPE html>
<html>
	<head>
		<title>Book Marketplace</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/index.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/body.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>
		
		<div class="container">

			<form class="form-signin" method="post" action="php/loginCheck.php">
		        <h2 class="form-signin-heading">Please sign in</h2>
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

				<?php
					if (isset($_GET['badInfo']) and $_GET['badInfo'] = true) 
					{
						?>
						<div class="alert alert-danger fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    You entered the wrong email or password. <strong>Please Try Again</strong>
						</div>
						<?php
					}
					elseif (isset($_GET['error']) and $_GET['error'] = true) 
					{
						?>
						<div class="alert alert-danger fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Something is wrong!</strong> That's all we can tell you.<br>
						    If the problem persists, please contact the developers through the contact us page.
						</div>
						<?php
					}
				?>

		        <div class="checkbox">
		          <label>
		            <input type="checkbox" name="remember" value="remember-me"> Remember me
		          </label>
		        </div>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	        </form>
		</div>
		
		<footer class="footer">
	 	    <div class="container">
		 	    <p class="text-muted">Designed by the people of BC for the People of BC</p>
	 	    </div>
 	    </footer>
	</body>
</html>