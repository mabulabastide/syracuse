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

/* Include all the classes */ 
 include("class/pDraw.class.php"); 
 include("class/pImage.class.php"); 
 include("class/pData.class.php");

 /* Create your dataset object */ 
 $myData = new pData(); 

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

$myData->addPoints($n_data);
/* Create a pChart object and associate your dataset */ 
 $myPicture = new pImage(700,230,$myData);

 /* Choose a nice font */
$myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));

 /* Define the boundaries of the graph area */
 $myPicture->setGraphArea(60,40,670,190);

 /* Draw the scale, keep everything automatic */ 
 $myPicture->drawScale();

 /* Draw the scale, keep everything automatic */ 
 $myPicture->drawSplineChart();

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/basic.png");

echo "<br><br>";
echo $iter.' '.'iterations parcourus';
echo "<br><br>";
echo "le maximun &eacute;tait".' '.$max;
echo "<br><br>";
echo $str;
echo "<br><br>";
print_r($myData->getData());
?>
</body>
</html>
