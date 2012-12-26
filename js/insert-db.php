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
// $sql1 = "CREATE TABLE scoreboard( name VARCHAR(30), score int)";
//	 $conn->query($sql1);
//$sql3 = "TRUNCATE TABLE scoreboard";
//$conn->query($sql3);
      try 
	{
        $name = $_POST['name'];
        $score = $_POST['score'];
        // Insert data
		if($name&&$score)
		{
        $sql_insert = "INSERT INTO scoreboard (name, score) 
                   VALUES (?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $score);

        $stmt->execute();
		echo "<h3>Your're registered!</h3>";
		}
    }
    catch(Exception $e)
    {
        die(var_dump($e));
    }
        /*$stmt->bindValue(1, $name);
        $stmt->bindValue(2, $score);
        $stmt->execute();  */
	?>