<?php
$puzzle = "";
$i=0;

for($i=0; $i <16; $i++)
{
	$ch = rand(65,91);
	$puzzle .= chr($ch);
}

echo $puzzle;

?>