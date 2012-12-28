<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
    echo "dbpushe";
	$host = "us-cdbr-azure-east-b.cloudapp.net";
    $user = "bcd2949c8baf7b";
    $pwd = "ee7246b9";
    $db = "wordaddABbVVe2ev";
    try 
	{
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e)
	{
        die(var_dump($e));
    }
	$list=array('E','E','E','E','E','E','T','T','T','A','A','A','O','O','O','I','I','I','N','N','N','S','S','S','S','R','R','R','H','H','L','L','D','D','D','D','C','C','U','U','M','M','F','P','G','W','Y','B','V','K','X','J','Q','Z');
/*$sql1 = "CREATE TABLE games(id INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),seq VARCHAR(16))";
$conn->query($sql1);*/
while(true) 
{
$sql3 = "TRUNCATE TABLE games";
$conn->query($sql3);
   try 
	{
		$j =0;
		while($j <10) {
		$puzzle ="";
		for($i=0; $i <16;$i++)
			$puzzle .= $list[mt_rand()%54];
		$sql_insert = "INSERT INTO games(seq) 
                   VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $puzzle);
        $stmt->execute();
		$j++;
		}
        
    }
    catch(Exception $e)
    {
        die(var_dump($e));
    }
	sleep(10);
}
?>
</body>
</html>