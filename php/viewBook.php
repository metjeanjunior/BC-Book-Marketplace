<!DOCTYPE html>
<html>
	<head>
		<title>View Book</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/marquee.js"></script>
		<script src="../js/searchbar.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
	</head>
	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>
	</body>
</html>
<?php
	// if(!isset($_GET['itemId']))
	// 	header("Location: ../index.php");

	
	// $ibsn = $_GET['ibsn'];
	$ibsn = '2147483647';

	$dbc = connectToDB();
	if ($dbc == 'bad')
		header("Location: viewBook.php?error=true");;

	$query = "select * from book where book_ibsn = $ibsn";
	$result = performQuery($dbc, $query);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	echo $row[1];

	?>
		<div class="container">
			<div class="row">
				
			</div>
		</div>
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