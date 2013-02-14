<html>
<head>
<link href="styles/images.css" rel="stylesheet" type="text/css">
</head>


<?php

	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}
    $sql_select = "SELECT * FROM leaderboard order by Score desc";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
	//var_dump($registrants);
	//echo "<br/> I am fetching <br/> ";
    if(count($registrants) > 0)
	{
		//echo count($registrants);
        echo "<div id='container'>";
		$i=0;
		$prev=NULL;
        foreach($registrants as $registrant) 
		{
			//var_dump($registrant);
			if($i < 8)	
			{
			echo "<div class='panel'><div class='hover'>";
            /*echo "<tr><th>".$i."</th>";
			echo "<th>".$registrant['Name']."</th>";
            echo "<th><th>".$registrant['Score']."</th></th></tr>";*/
			$tmp = "https://graph.facebook.com/".$registrant['id']."/picture?type=large";
			echo "<img src='$tmp' height='200' width='200'>";
			echo "<label class='goup'>".$registrant['name']."</label><br/>";
			echo "<label class='goup2'> Score:".$registrant['score']."</label>";
			echo "</div></div>";
			}
			$i++;
        }
        echo "</div>";
    } 
	else
	{
        echo "<h3>Oops,Looks like its sleep time ,nobody is playing! </h3>";
    }
	echo "</div>";
?>
</html>