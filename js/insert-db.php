<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "us-cdbr-azure-east-b.cloudapp.net";
    $user = "bcd2949c8baf7b";
    $pwd = "ee7246b9";
    $db = "wordaddABbVVe2ev";


    // Connect to database.
    try 
	{
        $con = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e)
	{
        die(var_dump($e));
    }
	//comment here once table created.
 $sql = "CREATE TABLE score_card(name VARCHAR(30), score int)"; 
  
  
  //$con = mysql_connect("localhost","peter","abc123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("score_card", $con);


  $name = $_GET["name"];
  $score = $_GET["score"]; 
$sql="INSERT INTO Persons (name,score)
VALUES
($name,$score)";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);
   
 
/* $sql_insert = "INSERT INTO _scoreboard(name, score) VALUES (?,?)";
  $stmt = $conn->prepare($sql_insert);
  $stmt->bindValue(0, $name);
  $stmt->bindValue(1, $score);
print '<script type="text/javascript">'; 
  print 'alert("at 2");
  print '</script>';  
        $stmt->execute();
   print '<script type="text/javascript">'; 
  print 'alert("at 5");
    print '</script>';  
  print '<script type="text/javascript">'; 
  print 'alert("inserted") ';
  print '</script>'; 
   echo 'success';	*/
?>
