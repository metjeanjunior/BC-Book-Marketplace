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
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
	</head>
	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)
		</marquee>
		<div class="container">
			<div class="centerstuff">
				<h2>Customer Settings</h2>
				<button class="btn btn-primary" type="button" id="transactions">View Transactions</button>
				<button class="btn btn-primary" type="button" id="updateEmail">Update Email</button>
				<button class="btn btn-primary" type="button" id="updatePassword">Update Password</button>
			</div>
			<table class="table table-bordered" hidden="hidden">
				<thead>
					<tr>
						<th>Transaction ID</th>
						<th>Sender ID</th>
						<th>Receiver ID</th>
						<th>Book ISBN</th>
						<th>Transaction Price</th>
						<th>Transaction Type</th>
						<th>Transaction Date</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					while($row = $result->fetch_assoc()) { 
				?>
					<tr>
						<td><?php echo $row['transaction_id']; ?></td>
						<td><?php echo $row['sender_id']; ?></td>
						<td><?php echo $row['receiver_id']; ?></td>
						<td><?php echo $row['book_ibsn']; ?></td>
						<td><?php echo $row['transaction_price']; ?></td>
						<td><?php echo $row['transaction_type']; ?></td>
						<td><?php echo $row['transaction_date']; ?></td>
					</tr>
				<?php 
				} 
				?>
				</tbody>
			</table>
			<div class="col-md-4 col-md-offset-4">
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
									<input type="email" name="current-email" id="current-email" class="form-control" placeholder="Current Email address" required autofocus>	
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
									echo $_GET['redirect'];
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
			</div>
		</div>
	</body>
</html>
