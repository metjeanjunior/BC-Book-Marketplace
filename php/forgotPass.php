<?php
	if(isset($_GET['forgot-email']))
		update(); //get new function
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

	function update()
	{
		$dbc = connectToDB();
		if ($dbc == 'bad')
			header("Location: login.php?error=true&redirect=".$_POST['redirect']);
		else
		{
			$query = 'select lower(customer_email) from customer where customer_email = lower('.$_GET['forgot-email'].')';
			$result = performQuery($dbc, $query);
			$matches = mysqli_num_rows($result);
			if ($matches == 0)
				header("Location: login.php?bad-forgot-email=true");
			else
			{
				$pass = genPass();
				$query = 'udpate customer set customer_password = \''.sha1(pass).'\' where customer_email = '.$_GET['forgot-email'];
				
				$to = $_GET['forgot-email'];
				$subject = 'Email reset from bc book swap';
				$body = "Dear valued customer,\n You recently requested a new password. Please find 
					your temporary password below.\n $pass";
				mail($to, $subject, $body);
				header("Location: login.php?success-forgot-email=true");
			}

		}
		disconnectFromDB($dbc);
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

	function genPass()
	{
		$page = 'http://watchout4snakes.com/wo4snakes/Random/RandomWord';

		$ch = curl_init($page);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$res = '';
		for ($i=0; $i < 4; $i++) { 
			$res .= curl_exec($ch).' ';
		}
		curl_close($ch);
		return $res;
	}