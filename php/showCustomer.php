<?php
include ('../include/dbconn.php');
$dbc = connect_to_db("metelusj");

$result = perform_query($dbc, "SELECT * from transaction");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>View Transaction and Customer Settings</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/marquee.js"></script>
		<script src="../js/showCustomer.js"></script>
		<script src="../js/viewRes.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link rel="stylesheet" type="text/css" href="../css/viewRes.css">
	</head>
	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)
		</marquee>
		<div class="container">
			<div class="centerstuff">
				<h2>Customer Portal</h2>
				<button class="btn btn-primary" type="button" id="transactions-button">View Transactions</button>
				<button class="btn btn-primary" type="button" id="update-email-button">Update Email</button>
				<button class="btn btn-primary" type="button" id="update-password-button">Update Password</button>
			</div>

			<!-- Transactions -->
			<div id="transactions-div">
				<div class="well well-sm res-header">
				    <strong>Category Title</strong>
				    <div class="btn-group">
				        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
				        </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
				            class="glyphicon glyphicon-th"></span>Grid</a>
				    </div>
				</div>
				<div id="products" class="row list-group">
					<?php 
						while($row = $result->fetch_assoc()) { 
					?>
					    <div class="item  col-xs-4 col-lg-4">
						    <div class="thumbnail">
						        <div class="caption">
						            <h4 class="group inner list-group-item-heading">
						                <?php echo $row['book_ibsn']; ?>-<?php echo $row['transaction_type']; ?></h4> 
						            <p class="group inner list-group-item-text">
						                On: <?php echo $row['transaction_date']; ?></p>
						            <p>From: <?php echo $row['sender_id']; ?></p>
						            <p>To: <?php echo $row['receiver_id']; ?></p>
						            <div class="row">
						                <div class="col-xs-12 col-md-6">
						                    <p class="lead">
						                        $<?php echo $row['transaction_price']; ?></p>
						                </div>
						                <div class="col-xs-12 col-md-6">
						                    <form method="post" action="viewBook.php">
						                        <input type="text" name="bookID" value=""+ info.book_id +"" hidden="hidden">
						                        <input type="submit" class="btn btn-success" value="View Book">
						                    </form>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
					<?php 
					} 
					?>
				</div>
			</div>

			<!-- Update email -->
			<div class="col-md-4 col-md-offset-4" id="update-email-div" hidden="hidden">
				<div class="panel-body">
					<div class="text-center">
						<form id="update-email-form" method="get" method="post" action="updateEmail.php" onsubmit="return true">
							<h3><i class="fa fa-lock fa-4x"></i></h3>
							<h2 class="text-center">Update Email</h2>
							<p>Update your email entering your old email and entering your current email.</p>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
									<label for="old-email" class="sr-only">Old Email address</label>
									<input type="email" name="old-email" id="old-email" class="form-control" placeholder="Old Email address" required autofocus><br>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
									<label for="current-email" class="sr-only">Current Email address</label>
									<input type="email" name="current-email" id="current-email" class="form-control" placeholder="New Email address" required autofocus>	
								</div>
							</div>
							<div class="form-group">
								<input class="btn btn-lg btn-primary btn-block" value="Update Email" type="submit">
							</div>
						</form>
							<?php
								if (isset($_GET['success-current-email']) and $_GET['success-current-email'] = true) 
								{
									?>
									<div class="alert alert-success fade in">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    <strong>Congrats!</strong>
									    Your email was updated and a confirmation email was sent to you!
									</div>
									<?php
									// echo $_GET['redirect'];
								}
								elseif (isset($_GET['bad-old-email']) and $_GET['bad-old-email'] = true) 
								{
									?>
									<div class="alert alert-danger fade in">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    <strong>Wrong Email!</strong>
									    Your email is not in our database. Please try again.
									</div>
									<?php
									echo $_GET['redirect'];
								}
							?>
						</div>
					</div>
				</div>

				<!-- Update Passwords -->
				<div class="col-md-4 col-md-offset-4" id="update-password-div" hidden="hidden">
					<div class="panel-body">
						<div class="text-center">
							<form id="forgot-form" method="get" method="post" action="forgotPass.php" onsubmit="">
								<h3><i class="fa fa-lock fa-4x"></i></h3>
								<h2 class="text-center">Dont like your old Password?</h2>
								<p>You can reset your password here.</p>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
										<input type="email" name="old-password" id="old-password" class="form-control" placeholder="Old Password" required autofocus><br>
										<input type="email" name="new-password" id="new-password" class="form-control" placeholder="New Password" required autofocus><br>
									</div>
								</div>
								<div class="form-group">
									<input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
								</div>
							</form>

							<div class="alert alert-danger fade in" id="emailErr" hidden="hidden">
								<?php
									if (isset($_GET['success-forgot-email']) and $_GET['success-forgot-email'] = true) 
									{
										?>
										<div class="alert alert-success fade in">
										    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										    <strong>Congrats!</strong>
										    Your password was updated and emailed to you.
										</div>
										<?php
										echo $_GET['redirect'];
									}
									elseif (isset($_GET['bad-forgot-email']) and $_GET['bad-forgot-email'] = true) 
									{
										?>
										<div class="alert alert-danger fade in">
										    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										    <strong>Wrong Email!</strong>
										    Your email is not in our database. Please try again.
										</div>
										<?php
										echo $_GET['redirect'];
									}
								?>
							</div>
						</div>
	                </div>
				</div>
			</div>
		</div>
	</body>
</html>
