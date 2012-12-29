<html>
<head>

<?php /*?><style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style><?php */?>

</head>
<body>
<?php  set_time_limit(0); ?>
 <img style="background-color:transparent;float:left" src="images/board.PNG" width="100" height="100">
<label style="font-size:30px;color:#90ee90;"  > Gamer Board </label> </p></br>
<br/>
<?php
   
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
   $host = "us-cdbr-azure-east-b.cloudapp.net";
    $user = "bcd2949c8baf7b";
    $pwd = "ee7246b9";
    $db = "wordaddABbVVe2ev";
    // Connect to database.
	/*print '<script src="count.js"> </script>';*/
    try 
	{
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION      );
    }
    catch(Exception $e)
	{
        die(var_dump($e));
    }
		/*$sql1 = "CREATE TABLE scoreboard( name VARCHAR(30), score int)";
		$conn->query($sql1);*/
		
    // Insert registration info
    
    // Retrieve data
	sleep(5);
    $sql_select = "SELECT * FROM scoreboard order by score desc";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0)
	{
        echo "<table>";
        echo "<tr><th>Rank</th>";
        echo "<th>Gamer</th>";
        echo "<th>Score</th></tr>";
		$i=0;
		$prev=NULL;
        foreach($registrants as $registrant) 
		{
			if($prev!=$registrant['score'])	
			{
			$i=$i+1;
			$prev=$registrant['score'];
			}
            echo "<tr><td>".$i."</td>";
			echo "<td>".$registrant['name']."</td>";
            echo "<td>".$registrant['score']."</td></tr>";
        }
        echo "</table>";
    } 
	else
	{
        echo "<h3>No one is currently registered.</h3>";
    }
	/*$min = date('i');
	$sec = date('s');
	$res = ( $min *60 + $sec ) %180;
	$wt = 130 - $res ;
	if($wt >0) {
	 sleep($wt);
	}*/
/*	sleep(2);
	 $sql3 = "TRUNCATE TABLE scoreboard";
     $conn->query($sql3);*/
	
?>
</body>
</html>