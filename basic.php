<?php
 /* CAT:Misc */

 /* Include all the classes */ 
// include("functions/syracuse.php"); 
 include("class/pDraw.class.php"); 
 include("class/pImage.class.php"); 
 include("class/pData.class.php");
 
 function syracuse($n)
{

	$iter = 0;
	$n_data=array();
	//echo "...working on"." ".$n;

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
	}
	return $n_data;
}
 /* Create your dataset object */ 
 
 $arr = array();
 $arr = syracuse(2628);

	$myData = new pData(); 
  
 /* Add data in your dataset */ 

 $myData->addPoints($arr,"DEFCA");
 //$MyData->setPalette("DEFCA",array("R"=>55,"G"=>91,"B"=>127));

 /* Create a pChart object and associate your dataset */ 
 $myPicture = new pImage(1000,800,$myData);

 /* Choose a nice font */
 $myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));

 /* Define the boundaries of the graph area */
 $myPicture->setGraphArea(50,10,1000,850);
 
 /* Draw the scale, keep everything automatic */ 
 $myPicture->drawScale();

 /* Draw the scale, keep everything automatic */ 
 //$myPicture->drawSplineChart();
 $myPicture->drawSplineChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO));
 $myPicture->setShadow(FALSE); 

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/basic.png");
?>