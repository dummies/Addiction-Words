<?php
$puzzle = "";
$vowels=array("A","E","I","O","U");
$conso =array("B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
$list =array('E','E','E','E','E','E','T','T','T','A','A','A','O','O','O','I','I','I','N','N','N','S','S','S','S','R','R','R','H','H','L','L','D','D','D','D','C','C','U','U','M','M','F','P','G','W','Y','B','V','K','X','J','Q','Z');
$len  =strlen($list)-1;
for($i=0; $i <15;$i++)
{	
	$puzzle .= $list[rand(0,$len)];
}
//completed generation 

echo $puzzle;

?>