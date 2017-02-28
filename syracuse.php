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
/*Conjecture de Syracuse*/

$n = htmlspecialchars($_POST['nombre']);
settype($n, "integer");
$iter =0;
$max = 0;
$str =" ";
$n_data=array();

echo "chiffre &agrave; calculer:".' '.$n;
echo "<br><br>";
// algorithme pour calculer le conjoncture de Syracuse
// nombre max est limité par php 32 bit
while($n > 1)
{
	$n_data[$iter] = $n;

	if($n % 2) 
	{
	   // impair
	    $n *= 3;
	    $n += 1;
	   // $n /= 2;
	    $iter ++;
	}
	else 
	{
	    //pair
	    $n /= 2;
	    $iter ++;
	}
	if($n > $max)
	{
		$max = $n;
	}

	echo $n;
	echo " | ";
	if($n >= 32 and $n <= 165)
		$str .= htmlspecialchars(chr($n));
}

echo "<br><br>";
echo $iter.' '.'iterations parcourus';
echo "<br><br>";
echo "le maximun &eacute;tait".' '.$max;
echo "<br><br>";
echo $str;
echo "<br><br>";
print_r($n_data);
?>
</body>
</html>
