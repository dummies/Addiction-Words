<html>
<head>

<style type="text/css">
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
</style>
<script>
var seconds_left = <?php $min = date('i'); $sec = date('s'); $res = ( $min *60 + $sec ) %180; $left = 180 -$res; echo $left;?>;
var interval = setInterval(function() {
    document.getElementById('timer_div').innerHTML = --seconds_left;
    if (seconds_left <= 0)
    {
        document.getElementById('timer_div').innerHTML = "Time's up";
        clearInterval(interval);
		window.location ="http://word-addiction.azurewebsites.net/game.html" ;
    }
}, 1000);
</script>
</head>
<body>
<?php  set_time_limit(0); ?>
<h1>Gamer Board</h1>
<div>
<label style="font-size:24px;color:#004080;"  > Time left </label>
<label id="timer_div" style="font:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:36px; color:#0080FF;position:relative ; left: +100px;"></label>
</div>
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
        echo "<h2>People who are registered:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>score</th>";
        echo "<th>rank</th></tr>";
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
            echo "<td>".$registrant['name']."</td></tr>";
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