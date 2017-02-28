<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Conjecture de Syracuse</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/normalize.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<?php
	include("functions/syracuse.php"); 
	$n = 2628;
	echo $n;
	$arr = array();
	$arr = syracuse($n);
	print_r($arr);


	?>
</body>
</html>