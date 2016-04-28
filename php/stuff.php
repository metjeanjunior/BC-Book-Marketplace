<?php
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
	echo $res;