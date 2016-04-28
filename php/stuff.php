<!-- Registration form from: http://bootsnipp.com/snippets/featured/basic-register-page -->
<!DOCTYPE html>
<html>
	<head>
		<title>Book Marketplace</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/marquee.js"></script>
		<script src="../js/login.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<link rel="stylesheet" type="text/css" href="../css/global.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>
		
		<div class="container" id="div-forms">

			<form class="form-signin" id="login-form" method="post" action="loginCheck.php">
		        <h2 class="form-signin-heading">Please sign in</h2>
		        <label for="email" class="sr-only">Email address</label>
		        <input type="email" id="email" class="form-control" placeholder="Email address" required autofocus>
		        <label for="password" class="sr-only">Password</label>
		        <input type="password" id="password" class="form-control" placeholder="Password" required>

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
			<div class="col-md-4 col-md-offset-4">
				<div class="panel-body">
					<div class="text-center">
						<form id="forgot-form" method="post" action="forgotPass.php" hidden="hidden">
							<h3><i class="fa fa-lock fa-4x"></i></h3>
							<h2 class="text-center">Forgot Password?</h2>
							<p>You can reset your password here.</p>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
									<label for="email" class="sr-only">Email address</label>
									<input type="email" id="email" class="form-control" placeholder="Email address" required autofocus><br>
								</div>
							</div>
							<div class="form-group">
								<input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">

								<button class="btn btn-link" type="button" id="forgot-login">Sign In</button>
								<button class="btn btn-link" type="button" id="forgot-register">Sign Up</button>
							</div>
						</form>
					</div>
                </div>
			</div>

	        <!-- Register form -->
			<div class="container-fluid">
				<form  id="register-form" method="post" action="signup.php" hidden="hidden">
				    <section class="container">
						<div class="container-page">				
							<div class="col-md-6">
								<h3 class="dark-grey">Registration</h3>
								
								<div class="form-group col-lg-12">
									<label for="username" class="sr-only">Username</label>
									<input type="test" id="username" class="form-control" placeholder="Username" required autofocus><br>
								</div>
								
								<div class="form-group col-lg-6">
									<label for="password" class="sr-only">Password</label>
							        <input type="password" id="password" class="form-control" placeholder="Password" required>
								</div>
								
								<div class="form-group col-lg-6">
									<label for="passwordCheck" class="sr-only">Repeat Password</label>
							        <input type="password" id="passwordCheck" class="form-control" placeholder="Re-enter Password" required>
								</div>
												
								<div class="form-group col-lg-6">
									<label for="email" class="sr-only">Email address</label>
									<input type="email" id="email" class="form-control" placeholder="Email address" required autofocus><br>
								</div>
								
								<div class="form-group col-lg-6">
									<label class="sr-only">Repeat Email Address</label>
									<input type="email" id="email" class="form-control" placeholder="Re-enter Email address" required autofocus><br>
								</div>			
								
								<div class="col-sm-6">
									<input type="checkbox" class="checkbox" />Sigh up for our newsletter
								</div>

								<div class="col-sm-6">
									<input type="checkbox" class="checkbox" />Send notifications to this email
								</div>				
							
							</div>
						
							<div class="col-md-6">
								<h3 class="dark-grey">Terms and Conditions</h3>
								<p>
									By clicking on "Register", you understand that we do nothing more than connect 
									students togheter.
								</p>

								<p> 
									We don not even host a payment option. 
								</p>

								<p>
									You also fully understand that should an issue arise with a transcation, we are neither responsible nor can we help in any way. 
								</p>

								<p>
									If some of this does not make sense, feel free to reach out to us through
									the contact page.
								</p>
								<button class="btn btn-md btn-primary btn-block" type="submit">Sign up</button>

						        <button class="btn btn-link" type="button" id="register-login">Sign In</button>
						        <button class="btn btn-link" type="button" id="register-forgot">Forgot my password</button>
							</div>
						</div>
					</section>
				</form>
			</div>
		</div>
		
		<footer class="panel-footer footer">
		<!-- <footer class="footer"> -->
	 	    <div class="container">
		 	    <p class="text-muted">Designed by the people of BC for the People of BC</p>
	 	    </div>
 	    </footer>
	</body>
</html>