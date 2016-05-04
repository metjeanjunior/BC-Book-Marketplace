<?php
	if(isset($_POST['old-password']))
		updatePass();

	function updatePass()
	{
		$dbc = connect_to_db("metelusj");
		$encodedPass = sha1($_POST['old-password']);
		$user = $_POST['user'];
		$query = "SELECT customer_password from customer where customer_id = $user";
		$result = performQuery($dbc, $query)
		$result = mysqli_fetch_row($result);
		$oldPass = $result[2];

		if ($encodedPass != $oldPass)
			header("Location: showCustomer.php?bad-pass-update=true");
		else
		{
			$query = "UPDATE customer set customer_password = $encodedPass where customer_id = $user";
			performQuery($dbc, $query);
			$selfLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			header("Location: login.php?success-email-change=true?redirect=$selfLink");
		}
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