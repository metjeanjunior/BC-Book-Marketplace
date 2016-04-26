<?php
	// if(!isset($_GET['isbn']))
	// 	header("Location: ../index.php");
	// $page = 'http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords='.$_GET['isbn'];
	$page = 'http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=1338097679';
	echo "The url is ".$page.'<br>';
	$content = file_get_contents($page);
	$pattern = 'href="http:\/\/www.amazon.com\/[\-\/a-z0-9_-]';
	preg_match_all($pattern, $content, $res);
	echo "The pattern is " . htmlentities($pattern) . " <br />\n";
	echo "<br>The entire match is: " . htmlentities($res) . "<br />\n";
	// echo "<br> $content[2]";