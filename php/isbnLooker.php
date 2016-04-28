<?php
	// if(!isset($_GET['isbn']))
	// 	header("Location: ../index.php");
	// $page = 'http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords='.$_GET['isbn'];
	$page = 'http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=1338097679';
	// echo "The url is ".$page.'<br>';
	$content = file_get_contents($page);
	$pattern = '$http:\/\/www.amazon.com\/([A-Za-z]*-*)*\/dp\/1338097679\/ref=.*"><img$';
	preg_match_all ($pattern, $content, $res);
	if (is_null($res[0][0]))
		echo "empty(var)";
	$page = $res[0][0];
	// echo $page;

	// $titlePattern = '$<span id="productTitle" class="a-size-large">[\S- ]*<\/span>$';
	// $page = $res[0][0];
	// $content = file_get_contents($page);
	// preg_match_all ($titlePattern, $content, $res);
	// // echo $res;
	// if (is_null($res[0][0]))
	// 	echo "empty(var)";
	// $bookTitle = $res[0][0];
	// echo "the book title is $bookTitle";	

	$titlePattern = '<title>[\S ]*';
	// echo $titlePattern;
	// $page = $res[0][0];
	$content = file_get_contents($page);
	// echo $content;
	preg_match_all ($titlePattern, $content, $res);
	echo $res[0];
	if (is_null($res[0][0]))
		echo "empty(var)";
	else
		$title = $res[0][0].'test';
	// echo sizeof($tittle);
	// echo $tittle[2];