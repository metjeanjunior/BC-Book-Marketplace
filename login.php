<!DOCTYPE html>
<html>
	<head>
		<title>Book Marketplace</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/marquee.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>
		
		<div class="container" id="div-forms">

			<form class="form-signin" id="login-form" method="post" action="php/loginCheck.php">
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
					elseif (isset($_GET['notLogged']) and $_GET['notLogged'] = true) 
					{
						?>
						<div class="alert alert-danger fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>You're not logged IN!</strong>
						    Please do so and try again.
						</div>
						<?php
						echo $_GET['redirect'];
					}
				?>

		        <div class="checkbox" id="remember">
		          <label>
		            <input type="checkbox" name="remember" value="remember-me"> Remember me
		          </label>
		        </div>

		        <?php 
		        	if (isset($_GET['redirect']) and $_GET['redirect'] = true)
		        	{
		        		?>
		        		<input type="text" hidden="hidden" name="redirect" value="<?php $_GET['redirect']?>">
		        		<?php
		        	}
		        ?>

		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

		        <button class="btn btn-link" type="button" id="login-forgot">Forgot my password</button>
		        <button class="btn btn-link" type="button" id="login-register">Sign Up</button>
	        </form>

			<!-- Forgot password form -->
			<form class="form-signin" id="forgot-form" method="post" action="php/loginCheck.php" hidden="hidden">
				<h2 class="form-signin-heading">Forgot my Password</h2>

				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>

		        <button class="btn btn-md btn-primary btn-block" id="reset" type="submit">Reset my password</button>

		        <button class="btn btn-link" type="button" id="forgot-login">Sign In</button>
		        <button class="btn btn-link" type="button" id="forgot-register">Sign Up</button>
	        </form>

	        <!-- Register form -->
			<form class="form-signin" id="register-form" method="post" action="php/loginCheck.php" hidden="hidden">
				<h2 class="form-signin-heading">Register</h2>

				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>

				<label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

				<label for="inputPasswordCheck" class="sr-only">Password</label>
		        <input type="password" id="inputPasswordCheck" class="form-control" placeholder="Re-enter Password" required>

		        <button class="btn btn-md btn-primary btn-block" type="submit">Sign up</button>

		        <button class="btn btn-link" type="button" id="register-login">Sign In</button>
		        <button class="btn btn-link" type="button" id="register-forgot">Forgot my password</button>
	        </form>
		</div>
		
		<footer class="panel-footer footer">
		<!-- <footer class="footer"> -->
	 	    <div class="container">
		 	    <p class="text-muted">Designed by the people of BC for the People of BC</p>
	 	    </div>
 	    </footer>
	</body>
</html>