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
	<div id="logo">Thank you for submitting a book. A buyer will get back to you shortly.</div>
	<div>
		<a  href="../index.php">Home</a>
	</div>
	</body>

<?php
	$dbc = connectToDB();
	$bookname = mysql_escape_string($_POST['book-name']);
	$description = mysql_escape_string($_POST['description']);
	$senderID = mysql_escape_string($_POST['user']);
	$bookibsn = $_POST['book-ibsn'];
	$condition = mysql_escape_string($_POST['condition']); // How do you update a set type in MySQL from PHP????
	$price = floatval($_POST['price']);
	$price = round($price, 2);
	$image = mysql_escape_string($_POST['image']);

	$query  = "SELECT customer_id from customer where customer_email = '$senderID'";
	$result = performQuery($dbc, $query);
	$result = mysqli_fetch_row($result);
	$senderID = $result[0];

	if($image == '')
		$query = "INSERT into book (seller_id, book_ibsn, book_name, book_description, book_price, book_condition, book_date_added) values
				('$senderID', '$bookibsn', '$bookname', '$description', $price, '$condition', now())";
	else
		$query = "INSERT into book (seller_id, book_ibsn, book_name, book_description, book_price, book_condition, book_date_added, book_image) values
				('$senderID', '$bookibsn', '$bookname', '$description', $price, '$condition', now(), '$image')";

	// echo $query;
	performQuery($dbc, $query);

	$query = "INSERT into transaction (sender_id, book_ibsn, transaction_price, transaction_date) values
				('$senderID','$bookibsn', $price, now())";
	// echo $query;
	performQuery($dbc, $query);

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
		$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
		return ($result);
	}
