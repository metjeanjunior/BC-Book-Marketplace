<?php
	$username = $_POST['signup-username'];
	$password = sha1($_POST['signup-password']);
	$email = $_POST['signup-email'];

	if (validEmail($email) && validUserName($username))
		insertNewUser($username, $password, $email);

	function validUserName($username)
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			header("Location: login.php?error=true&redirect=".$_POST['redirect']);
		else
		{
			$query = "select lower(customer_username) from customer where customer_username = lower('$username')";
			$result = performQuery($dbc, $query);
			$matches = mysqli_num_rows($result);
			if($matches != 0)
				header("Location: login.php?bad-signup-username=true");
			return $matches == 0;
		}
	}

	function validEmail($email)
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			header("Location: login.php?error=true&redirect=".$_POST['redirect']);
		else
		{
			$query = "select lower(customer_email) from customer where customer_email = lower('$email')";
			// echo $email;
			// echo $query;
			$result = performQuery($dbc, $query);
			$matches = mysqli_num_rows($result);
			disconnectFromDB($dbc);
			if($matches != 0)
				header("Location: login.php?bad-signup-email=true");
			return $matches == 0;
		}
	}

	function insertNewUser($username, $password, $email)
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			header("Location: login.php?error=true&redirect=".$_POST['redirect']);
		else
		{
			$query = "insert into customer values (DEFAULT, '$username', '$password', '$email', now())";
			$result = performQuery($dbc, $query);
			disconnectFromDB($dbc);
			header("Location: login.php?success-signup=true");
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