<?php
	if(isset($_GET['forgot-email']))
		checkEmail(); //get new function
	if(isset($_GET['find']))
		checkEmail();

	function checkEmail()
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			echo "-1";
		else
		{
			$query = 'select lower(customer_email) from customer where customer_email = lower('.$_GET['find'].')';
			$result = performQuery($dbc, $query);
			$matches = mysqli_num_rows($result);
			echo $matches;
		}
	}

	function connectToDB()
	{
		$dbc= @mysqli_connect("localhost", "metelusj", "23JD5h5z", $database) or
			$dbc = 'bad';
		return ($dbc);
	}

	function performQuery($dbc, $query)
	{
		$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
		return $result;
	}

	function disconnectFromDB($dbc)
	{
		mysqli_close($dbc);
	}