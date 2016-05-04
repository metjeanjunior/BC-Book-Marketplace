<?php
	if (isset($_COOKIE['loginCookieUser']))
	{
		if (isset($_GET['redirect']))
			header("Location: ".$_GET['redirect']);
		else
			header("Location: showCustomer.php");
	}
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
		// Store the login information in cookies	
		if (isset($_POST['remember']))
			setcookie("loginCookieUser", $_POST['login-email'], time() + (365 * 24 * 60 * 60));
		else
			setcookie("loginCookieUser", $_POST['login-email'], time() + 900);

		$_COOKIE['loginCookieUser']= $_POST['login-email'];
		// echo "JUst set a cookie";
		// foreach ($_COOKIE as $key=>$value)
		// 	echo "\$_COOKIE['$key'] = $value<br />";
		if(isset($_GET['redirect']))
			header("Location: ".$_GET['redirect']);
		else
		  	header("Location: ../index.php");
		// echo $_GET['redirect'];
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