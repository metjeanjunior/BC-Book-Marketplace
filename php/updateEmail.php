<?php
	if(isset($_GET['old-email']))
		updateEmail(); //get new function
	// if(isset($_GET['find']))
	// 	checkEmail();

	// function checkEmail()
	// {
	// 	$dbc = connectToDB();
	// 	if ($dbc == 'bad')
	// 		echo "-1";
	// 	else
	// 	{
	// 		$query = 'select lower(customer_email) from customer where customer_email = lower('.$_GET['find'].')';
	// 		$result = performQuery($dbc, $query);
	// 		$matches = mysqli_num_rows($result);
	// 		echo $matches;
	// 	}
	// }

	function updateEmail()
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			header("Location: showCustomer.php?error=true&redirect=".$_POST['redirect']);
		else
		{
			$email = $_GET['old-email'];
			$currentemail = $_GET['current-email'];
			$query = "select lower(customer_email) from customer where customer_email = lower('$email')";
			$result = performQuery($dbc, $query);
			$matches = mysqli_num_rows($result);
			if ($matches == 0)
				header("Location: showCustomer.php?bad-old-email=true");
			else
			{
				$query = "UPDATE customer set customer_email = lower('$currentemail') WHERE customer_email = lower('$email')";
				$result2 = performQuery($dbc, $query);
				$to = $_GET['current-email'];
				$subject = 'Email Update from bc book swap';
				$body = "Dear valued customer,\n You recently updated your email. Please find use this email address below from now on.\n $currentemail";
				mail($to, $subject, $body);
				$selfLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				header("Location: login.php?success-email-change=true?redirect=$selfLink");
			}

		}
		disconnectFromDB($dbc);
	}

	function connectToDB()
	{
		$dbc= @mysqli_connect("localhost", "metelusj", "23JD5h5z", "metelusj") or
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