<?php
$puzzle = "";
//$vowels=array("A","E","I","O","U");
//$conso =array("B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
//$list =array('E','E','E','E','E','E','T','T','T','A','A','A','O','O','O','I','I','I','N','N','N','S','S','S','S','R','R','R','H','H','L','L','D','D','D','D','C','C','U','U','M','M','F','P','G','W','Y','B','V','K','X','J','Q','Z');


$high=array("E","T","A","O","I","N");
$medium=array("S","R","H","L","D","C","U","M","F","P");
$low=array("G","W","Y","B","V","K","X","J","Q","Z");
$len1=strlen($high)-1;
$len2=strlen($medium)-1;
$len3=strlen($low)-1;
//$len  =strlen($list)-1;
for($i=0; $i <16;)
{	
	$puzzle .= $high[mt_rand()% $len1];
	$puzzle .= $medium[mt_rand()% $len2];
	$puzzle .= $low[mt_rand()% $len3];
	$puzzle .= $high[mt_rand()% $len1];
	$i=$i+4;
}
//completed generation 

echo $puzzle;

?>