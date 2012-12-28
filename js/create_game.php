<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
try
{
$command ="schtasks /create /tn create_game'C:\sites\Addiction-Words\js\create_game.php' /sc daily /st 23:00 /ed 31/12/2100";
shell_exec($command);
}
catch(Exception $e) 
{
	die($e);
}
echo 'success!';
?>

</body>
</html>