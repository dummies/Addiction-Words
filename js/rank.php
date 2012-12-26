<html>
<body>
<?php 
echo 'website';
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