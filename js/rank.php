<html>
<body>
<?php 
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
echo 'results';
 $sql_select = "SELECT * FROM scoreboard order by score desc";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) >= 0)
	{
        echo "<h2>People who Played:</h2>";
        echo "<table>";
		echo "<th>rank</th></tr>";
        echo "<tr><th>Name</th>";
        echo "<th>score</th>";
		$i=0;
		$prev=NULL;
        foreach($registrants as $registrant) 
		{
			if($prev!=$registrant['score'])	
			{
			$i=$i+1;
			$prev=$registrant['score'];
			}
			echo "<td>".$i."</td></tr>";
            echo "<tr><td>".$registrant['name']."</td>";
            echo "<td>".$registrant['score']."</td>";
        }
        echo "</table>";
    } 
	else
	{
        echo "<h3>No one is currently registered.</h3>";
   }
?>
</body>
</html>