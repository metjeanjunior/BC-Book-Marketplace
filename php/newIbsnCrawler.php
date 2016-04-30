<?php
	$page = "https://www.googleapis.com/books/v1/volumes?q=isbn:".$_GET['ibsn'];
	$content = file_get_contents($page);
	echo $content;