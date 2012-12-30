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
 <img style="background-color:transparent;float:left" src="/images/board.PNG" width="100" height="100">
<br><br><br><label style="font-size:30px;color:#008055;"  > Gamer Board </label> </br></br></br>
<br/>
<?php
   
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
   /*$host = "us-cdbr-azure-east-b.cloudapp.net";
    $user = "bcd2949c8baf7b";
    $pwd = "ee7246b9";
    $db = "wordaddABbVVe2ev";*/
    // Connect to database.
	/*print '<script src="count.js"> </script>';*/
    /*try 
	{
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION      );
    }
    catch(Exception $e)
	{
        die(var_dump($e));
    }*/
		/*$sql1 = "CREATE TABLE scoreboard( name VARCHAR(30), score int)";
		$conn->query($sql1);*/
		
    // Insert registration info
    
    // Retrieve data
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}
	sleep(5);
    $sql_select = "SELECT * FROM scores order by Score desc";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
	echo $registrants;
	echo "<br/> I am fetching <br/> ";
    if(count($registrants) > 0)
	{
        echo "<table>";
        echo "<tr><th color=#408000>Rank</th>";
        echo "<th color=#408000>Gamer</th>";
        echo "<th><th color=#408000>Score</th></th></tr>";
		$i=0;
		$prev=NULL;
        foreach($registrants as $registrant) 
		{
			if($prev!=$registrant['score'])	
			{
			$i=$i+1;
			$prev=$registrant['score'];
			}
            echo "<tr><th>".$i."</th>";
			echo "<th>".$registrant['name']."</th>";
            echo "<th><th>".$registrant['score']."</th></th></tr>";
        }
        echo "</table>";
    } 
	else
	{
        echo "<h3>No one is currently registered.</h3>";
    }
	
	echo "<br/>I am closing<br/>";
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