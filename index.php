<!DOCTYPE html>
<html>
	<head>
        <title>Book Marketplace</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/login.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/body.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>

		<div class="header">
			<!-- BEGIN # BOOTSNIP INFO -->
			<div class="container">
			    <div class="row">
			        <p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Open Login Modal</a></p>
			    </div>
			</div>
			<!-- END # BOOTSNIP INFO -->

			<!-- BEGIN # MODAL LOGIN -->
			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			        <div class="modal-dialog">
			            <div class="modal-content">
			                <div class="modal-header" align="center">
			                    <!-- <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg"> -->
			                    <h1>BCBS</h1>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			                    </button>
			                </div>
			                
			                <!-- Begin # DIV Form -->
			                <div id="div-forms">
			                
			                    <!-- Begin # Login Form -->
			                    <form id="login-form">
			                        <div class="modal-body">
			                            <div id="div-login-msg">
			                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
			                                <span id="text-login-msg">Type your username and password.</span>
			                            </div>

			                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
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
			                        </div>
			                        <div class="modal-footer">
			                            <div>
			                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
			                            </div>
			                            <div>
			                                <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
			                                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
			                            </div>
			                        </div>
			                    </form>
			                    <!-- End # Login Form -->
			                    
			                    <!-- Begin | Lost Password Form -->
			                    <form id="lost-form" style="display:none;">
			                        <div class="modal-body">
			                            <div id="div-lost-msg">
			                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
			                                <span id="text-lost-msg">Type your e-mail.</span>
			                            </div>
			                        </div>
			                        <div class="modal-footer">
			                            <div>
			                                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
			                            </div>
			                            <div>
			                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
			                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
			                            </div>
			                        </div>
			                    </form>
			                    <!-- End | Lost Password Form -->
			                    
			                    <!-- Begin | Register Form -->
			                    <form id="register-form" style="display:none;">
			                        <div class="modal-body">
			                            <div id="div-register-msg">
			                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
			                                <span id="text-register-msg">Register an account.</span>
			                            </div>
			                            <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
			                            <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
			                            <input id="register_password" class="form-control" type="password" placeholder="Password" required>
			                        </div>
			                        <div class="modal-footer">
			                            <div>
			                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
			                            </div>
			                            <div>
			                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
			                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
			                            </div>
			                        </div>
			                    </form>
			                    <!-- End | Register Form -->
			                    
			                </div>
			                <!-- End # DIV Form -->
			                
			            </div>
			        </div>
			</div>
			<!-- END # MODAL LOGIN -->
	 	</div>


	 	<div id="logo">BC's MarketPlace</div>

	 	<div class="container">
	 		<div class="row">
	 	        <div class="col-sm-6 col-sm-offset-3">
	 	            <div id="imaginary_container"> 
	 	                <div class="input-group stylish-input-group">
	 	                    <input type="text" class="form-control"  placeholder="Search" >
	 	                    <span class="input-group-addon">
	 	                        <button type="submit">
	 	                            <span class="glyphicon glyphicon-search"></span>
	 	                        </button>  
	 	                    </span>
	 	                </div>
	 	            </div>
	 	        </div>
	 		</div>
	 	</div>
	 	
	 	<footer class="footer">
	 	    <div class="container">
		 	    <p class="text-muted">Designed by the people of BC for the People of BC</p>
	 	    </div>
 	    </footer>

	 	<!-- <br><br><br><br><br><br> -->
		<!-- <img src="img/cat.jpeg"> -->
		<!-- <img src="img/dog.jpeg"> -->
	</body>
</html>