<?php
	include("../include/dbconn.php");
	include '../include/forceLogin.php';
?>
<!-- Inspired by: http://bootsnipp.com/snippets/featured/search-results -->
<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="../js/marquee.js"></script>
		<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAPc_E2pw9Fncvre_WqLYBn0gUcNyXRI3w"></script> -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6Vben8F5cr9oIo_SWpz5401oPBwoUpY"
			async defer></script>
		<script src="../js/transaction.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/transaction.css">
	</head>
	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>
		<div>
			<a  href="../index.php">Home</a>
		</div>

		<div class="container">
			<div class="jumbotron" id="message"></div>
		</div>

		<!-- <div id="map" hidden="hidden"></div> -->
		<div id="map"></div>
		<button class="btn-primary" id="toggleButton" onclick="toggleMap();">Show/Hide Map</button>
	</body>
</html>
<?php

	$user = "";
	$bookName = $_POST['bookName'];
	$sellerEmail = $_POST['sellerEmail'];
	$bookISBN = $_POST['bookISBN'];

	if ( isset( $_POST['button'] ) ){
		if(isset($_COOKIE['loginCookieUser'])) {
			 $user = $_COOKIE['loginCookieUser'];
		}
		$dbc = connectToDB();
		$query = "UPDATE transaction SET receiver_id='$user' WHERE book_ibsn='$bookISBN'";
		$result = performQuery($dbc, $query);
		$row = mysqli_fetch_array($result,MYSQLI_NUM);

		$subject = $bookName;
		$receiver = $sellerEmail;
		$message = "Your book has been requested by" . $user;
		$message2 = "You requested a book from" . $sellerEmail;
		mail($sellerEmail,$subject,$message);
		mail($user,$subject,$message2);
		@disconnect_from_db($dbc, $resultEmail );
	}
	?>
		<script type="text/javascript">
			var res = "\
				<h1><?php echo $bookName; ?></h1>\
				<p>\
				Seller: <?php echo $sellerEmail; ?> <br>\
				ISBN: <?php echo $bookISBN; ?> <br>\
				The seller/lender has been informed of your request!\
				</p>\
				<p>";
			$("#message").append(res);
			// $(".jumbotron").append(res);
		</script>
	<?php
	function connectToDB()
	{
		$dbc= @mysqli_connect("localhost", "metelusj", "23JD5h5z", "metelusj") or
			$dbc = 'bad';
		return ($dbc);
	}

	function disconnectFromDB($dbc)
	{
		mysqli_close($dbc);
	}
	// Modified PeformQuery, takes the database and query as arguments, returns result set

	function performQuery($dbc, $query)
	{
		//echo "My query is >$query< <br />";
		$result = mysqli_query($dbc, $query) or die("bad query: ".mysqli_error($dbc));
		return ($result);
	}
	?>
