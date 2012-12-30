<?php
	/*used to insert data into leader board.*/
	/*$host = "us-cdbr-azure-east-b.cloudapp.net";
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
//$sql1 = "CREATE TABLE scoreboard( name VARCHAR(30), score int)";
//$conn->query($sql1);

   try 
	{
        $name = $_GET["name"];
        $score = $_GET['score'];
        $sql_insert = "INSERT INTO scoreboard (name, score) 
                   VALUES (?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $score);
        $stmt->execute();
    }
	
    catch(Exception $e)
    {
        die(var_dump($e));
    }*/
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}
  $v1 = $_GET["name"];
  $v2 = $_GET['score'];
   
   $stmt3 = $conn->prepare("INSERT INTO #scores (Name,Score) VALUES (:var1, :var2)");

   if ($stmt3) {
      $stmt3->bindValue(1, $v1);
      $stmt3->bindValue(2, $v2);
      if ($stmt3->execute())
         echo "Execution succeeded\n";     
      else
         echo "Execution failed\n";
   }
   else
      var_dump($conn->errorInfo());
   


?>