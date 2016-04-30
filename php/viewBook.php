<?php
include("../include/dbconn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Book</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/marquee.js"></script>
		<script src="../js/searchbar.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/viewBook.css">
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


	$bookID = $_POST['bookID'];
	//$ibsn = '2147483647';

	$dbc = connectToDB();
	if ($dbc == 'bad')
		header("Location: viewBook.php?error=true");;

	$query = "select * from book where book_id = '$bookID'";
	$result = performQuery($dbc, $query);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);

	$bookSellerID = $row[5];

	$bookName = $row[2];
	$bookISBN = $row[1];
	$bookDescription = $row[3];
	$bookPrice = $row[4];
	$bookCondition = $row[6];
	$bookDate = $row[7];

	$query = "select * from customer where customer_id = '$bookSellerID'";
	$result = performQuery($dbc, $query);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	$SellerEmail = $row[3];



	//echo $bookName;
	//echo $SellerEmail;
	//echo $bookISBN;
	//echo $bookDescription;
	//echo $bookPrice;
	//echo $bookCondition;
	//echo $bookDate;

	?>
	<div class="jumbotron">
	  <h1><?php echo $bookName; ?></h1>
	  <p>
	  Seller: <?php echo $SellerEmail; ?> <br>
	  ISBN: <?php echo $bookISBN; ?> <br>
	  Price: <?php echo $bookPrice; ?> <br>
	  Condition: <?php echo $bookCondition; ?> <br>
	  Added on: <?php echo $bookDate; ?> <br><br>
	  <?php echo $bookDescription; ?>
	  </p>
	  <p>
	  <form method="post" action="transaction.php">
	  	<input type="text" name="bookID" value="<?php echo $bookID; ?>" hidden="hidden">
	  	<input type="text" name="bookSellerID" value="<?php echo $bookSellerID; ?>" hidden="hidden">
	  	<input type="text" name="sellerEmail" value="<?php echo $SellerEmail; ?>" hidden="hidden">
	  	<input type="text" name="bookISBN" value="<?php echo $bookISBN; ?>" hidden="hidden">
	  	<input type="text" name="bookDescription" value="<?php echo $bookDescription; ?>" hidden="hidden">
	  	<input type="text" name="bookPrice" value="<?php echo $bookPrice; ?>" hidden="hidden">
	  	<input type="text" name="bookCondition" value="<?php echo $bookCondition; ?>" hidden="hidden">
	  	<input type="text" name="bookDate" value="<?php echo $bookDate; ?>" hidden="hidden">
	  	<input type="text" name="bookName" value="<?php echo $bookName; ?>" hidden="hidden">

	   	<input type="submit" class="btn btn-primary btn-lg" value="Perform Transaction">
      </form>
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
	?>