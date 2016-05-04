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
	$bookibsn = $_POST['book-ibsn'];
	$condition = mysql_escape_string($_POST['condition']); // How do you update a set type in MySQL from PHP????
	$price = floatval($_POST['price']);
	$price = round($price, 2);
	$image = mysql_escape_string($_POST['image']);

	$query = "INSERT into book (book_ibsn, book_name, book_description, book_price, book_condition, book_date_added, book_image) values
			('$bookibsn', '$bookname', '$description', $price, '$condition', now(), '$image')";
	performQuery($dbc, $query);
	if(isset($_COOKIE['loginCookieUser'])){
		$query = "select customer_id from customer where customer_email = '$_COOKIE['loginCookieUser']'";
		$result = performQuery($dbc, $query);
		$row = mysqli_fetch_array($result,MYSQLI_NUM);
		$senderID = $row[0];

		$query = "INSERT into transaction (sender_id, book_ibsn, transaction_price, transaction_date) values
				('$senderID','$bookibsn', $price, now())";
		performQuery($dbc, $query);
	}

	/*
	if ( 0 == checklogin( $_POST['login-email'], $_POST['login-password']))
	{
		header("Location: login.php?badInfo=true");
	}
	elseif ( -1 == checklogin( $_POST['login-email'], $_POST['login-password']))
	{
		header("Location: login.php?error=true&redirect=".$_POST['redirect']);
	}
	else
	{

	// Note: We currently don't have any sessions set up - at all. So there's no way to do login checks without them.
	// Our code should probably "include[session.php]" or something like that; have a designated session.php file that checks whether the user is logged in


		// Store the login information in cookies
		if (isset($_POST['remember']))
			setcookie('loginCookieUser', $_POST['name'], time() + 900);
	  	header("Location: ../index.php");
	}
	// checklogin sees if an entry exists with the name password pair passed.
	// returns true if so, false otherwise.

	function checklogin($name, $passwd)
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			return -1;
		$encodepw = sha1($passwd);
		$result = performQuery($dbc,
			"select * FROM customer where customer_email='$name' and customer_password='$encodepw'");
		$matches = mysqli_num_rows($result);
		mysqli_free_result($result);
		disconnectFromDB($dbc);
		return $matches;
	}
	// Modified connectToDB takes database as an argument, returns database connection
	*/

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
	?>