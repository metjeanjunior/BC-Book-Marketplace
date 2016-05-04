<?php
	if(isset($_POST['old-password']))
		updatePass();

	function updatePass()
	{
		$dbc = connectToDB("metelusj");
		$encodedPass = sha1($_POST['old-password']);
		$newPass = sha1($_POST['new-password']);
		$user = $_POST['user'];
		$query = "SELECT customer_id, customer_password from customer where customer_email = '$user'";
		$result = performQuery($dbc, $query);
		$result = mysqli_fetch_row($result);
		$oldPass = $result[1];
		$user = $result[0];

		if ($encodedPass != $oldPass)
			header("Location: showCustomer.php?bad-pass-update=true");
		else
		{
			$query = "UPDATE customer set customer_password = '$newPass' where customer_id = $user";
			performQuery($dbc, $query);
			$selfLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			header("Location: login.php?success-pass-change=true?redirect=$selfLink");
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
		$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc)." with query: ".$query);
		return $result;
	}

	function disconnectFromDB($dbc)
	{
		mysqli_close($dbc);
	}