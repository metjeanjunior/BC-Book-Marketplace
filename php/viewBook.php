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

		<div class="container">
			<div class="alert alert-danger fade in" id="book-err-div" hidden="hidden">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    You entered the wrong email or password. <strong>Please Try Again</strong>
			</div>
		</div>
		<?php
			if(isset($_GET['error']))
			{
				?>
					<script type="text/javascript">
						$("#book-err-div").toggle();
					</script>
				<?php
				return -1;
			}
		?>
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

	$name = $result[1];
	$decription = $result[2];
	$condition = $result[3];

	?>
		this is a test
	<?php

	function connectToDB()
	{
		$dbc= @mysqli_connect("localhost", "metelusj", "23JD5h5z", "csci2254") or
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