<?php
$puzzle = "";
$vowels=array("A","E","I","O","U");
$conso =array("B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
for($i=0; $i <15;)
{	
	$puzzle .= $conso[rand(0,20)];
	$puzzle .= $vowels[rand(0,4)];
	$puzzle .= $conso[rand(0,20)];
	$i = $i +3;
}

$puzzle .= $vowels[rand(0,4)];
//completed generation 

echo $puzzle;

?>